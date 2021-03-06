<?php

namespace LearnosityQti\Processors\QtiV2\In\Interactions;

use LearnosityQti\Entities\QuestionTypes\clozeassociation;
use LearnosityQti\Entities\QuestionTypes\clozeassociation_response_container;
use LearnosityQti\Utils\QtiMarshallerUtil;
use LearnosityQti\Processors\QtiV2\In\Validation\GapMatchInteractionValidationBuilder;
use qtism\data\content\interactions\Gap;
use qtism\data\content\interactions\GapChoice;
use qtism\data\content\interactions\GapMatchInteraction as QtiGapMatchInteraction;
use qtism\data\content\interactions\Prompt;
use qtism\data\QtiComponentCollection;

class GapMatchInteractionMapper extends AbstractInteractionMapper
{
    public function getQuestionType()
    {
        /** @var QtiGapMatchInteraction $interaction */
        $interaction = $this->interaction;
        $possibleResponseMapping = $this->buildPossibleResponseMapping($interaction);

        list($template, $gapIdentifiers) = $this->buildTemplate($interaction);
        $question = new clozeassociation('clozeassociation', $template, array_values($possibleResponseMapping));
        $container = new clozeassociation_response_container();
        $question->set_response_container($container);

        if ($interaction->getPrompt() instanceof Prompt) {
            $promptContent = $interaction->getPrompt()->getContent();
            $question->set_stimulus(QtiMarshallerUtil::marshallCollection($promptContent));
        }

        $validationBuilder = new GapMatchInteractionValidationBuilder(
            'clozeassociation',
            $gapIdentifiers,
            $possibleResponseMapping,
            $this->responseDeclaration,
            $this->outcomeDeclarations
        );
        $validation = $validationBuilder->buildValidation($this->responseProcessingTemplate);

        if ($validation) {
            $question->set_validation($validation);
        }
        $question->set_duplicate_responses($validationBuilder->isDuplicatedResponse());
        return $question;
    }

    private function buildPossibleResponseMapping(QtiGapMatchInteraction $interaction)
    {
        $possibleResponseMapping = [];
        $gapChoices = $interaction->getComponentsByClassName('gapText', true);
        $gapChoices->merge($interaction->getComponentsByClassName('gapImg', true));
        /** @var GapChoice $gapChoice */
        foreach ($gapChoices as $gapChoice) {
            $gapChoiceContent = QtiMarshallerUtil::marshallCollection($gapChoice->getComponents());
            $possibleResponseMapping[$gapChoice->getIdentifier()] = $gapChoiceContent;
        }
        return $possibleResponseMapping;
    }

    private function buildTemplate(QtiGapMatchInteraction $interaction)
    {
        $templateCollection = new QtiComponentCollection();
        foreach ($interaction->getComponents() as $component) {
            // Ignore `prompt` and the `gapChoice` since they are going to be mapped somewhere else :)
            if (!$component instanceof Prompt && !$component instanceof GapChoice) {
                $templateCollection->attach($component);
            }
        }
        $gapIdentifiers = [];
        $content = QtiMarshallerUtil::marshallCollection($templateCollection);
        foreach ($interaction->getComponentsByClassName('gap', true) as $gap) {
            /** @var Gap $gap */
            $gapIdentifiers[] = $gap->getIdentifier();
            $gapString = QtiMarshallerUtil::marshall($gap);
            $content = str_replace($gapString, '{{response}}', $content);
        }
        return [$content, $gapIdentifiers];
    }
}
