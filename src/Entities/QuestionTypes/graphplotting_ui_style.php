<?php

namespace LearnosityQti\Entities\QuestionTypes;

use LearnosityQti\Entities\BaseQuestionTypeAttribute;

/**
* This class is auto-generated based on Schemas API and you should not modify its content
* Metadata: {"responses":"v2.108.0","feedback":"v2.71.0","features":"v2.107.0"}
*/
class graphplotting_ui_style extends BaseQuestionTypeAttribute {
    protected $fontsize;
    protected $validation_stem_numeration;
    protected $height;
    protected $width;
    protected $margin;
    protected $graph_controls;
    
    public function __construct(
            )
    {
            }

    /**
    * Get Font size \
    * Controls the size of base font for this question. Options are among 'small', 'normal', 'large', 'xlarge' and 'xxlarge'. \
    * @return string $fontsize ie. small, normal, large, xlarge, xxlarge  \
    */
    public function get_fontsize() {
        return $this->fontsize;
    }

    /**
    * Set Font size \
    * Controls the size of base font for this question. Options are among 'small', 'normal', 'large', 'xlarge' and 'xxlarge'. \
    * @param string $fontsize ie. small, normal, large, xlarge, xxlarge  \
    */
    public function set_fontsize ($fontsize) {
        $this->fontsize = $fontsize;
    }

    /**
    * Get Stem numeration (review only) \
    * Numeration character to be displayed to the left of the validation label. \
    * @return string $validation_stem_numeration ie. number, upper-alpha, lower-alpha  \
    */
    public function get_validation_stem_numeration() {
        return $this->validation_stem_numeration;
    }

    /**
    * Set Stem numeration (review only) \
    * Numeration character to be displayed to the left of the validation label. \
    * @param string $validation_stem_numeration ie. number, upper-alpha, lower-alpha  \
    */
    public function set_validation_stem_numeration ($validation_stem_numeration) {
        $this->validation_stem_numeration = $validation_stem_numeration;
    }

    /**
    * Get Height (px) \
    * The height of the graph with trailing px unit eg. "600px". \
    * @return string $height \
    */
    public function get_height() {
        return $this->height;
    }

    /**
    * Set Height (px) \
    * The height of the graph with trailing px unit eg. "600px". \
    * @param string $height \
    */
    public function set_height ($height) {
        $this->height = $height;
    }

    /**
    * Get Width (px) \
    * The width of the graph with trailing px unit eg. "600px". \
    * @return string $width \
    */
    public function get_width() {
        return $this->width;
    }

    /**
    * Set Width (px) \
    * The width of the graph with trailing px unit eg. "600px". \
    * @param string $width \
    */
    public function set_width ($width) {
        $this->width = $width;
    }

    /**
    * Get Margin (px) \
    * The margin around the graph to make room for labels. Can be a single value, e.g. "20px", or a CSS formatted string e.g. 
	"20px 10px 20px" (for margins with different values on each side). Note: Margin will default to 20px if there is a label
	 and the margin value is not set. \
    * @return string $margin \
    */
    public function get_margin() {
        return $this->margin;
    }

    /**
    * Set Margin (px) \
    * The margin around the graph to make room for labels. Can be a single value, e.g. "20px", or a CSS formatted string e.g. 
	"20px 10px 20px" (for margins with different values on each side). Note: Margin will default to 20px if there is a label
	 and the margin value is not set. \
    * @param string $margin \
    */
    public function set_margin ($margin) {
        $this->margin = $margin;
    }

    /**
    * Get Graph control options (deprecated) \
    * <span class="label label-danger">Deprecated</span> This attribute has been deprecated; consider using <em>toolbar.contro
	ls</em> instead. \
    * @return string $graph_controls ie. reset, delete  \
    */
    public function get_graph_controls() {
        return $this->graph_controls;
    }

    /**
    * Set Graph control options (deprecated) \
    * <span class="label label-danger">Deprecated</span> This attribute has been deprecated; consider using <em>toolbar.contro
	ls</em> instead. \
    * @param string $graph_controls ie. reset, delete  \
    */
    public function set_graph_controls ($graph_controls) {
        $this->graph_controls = $graph_controls;
    }

    
}

