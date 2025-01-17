<?php 

/**
 * Class PWElementVoucher
 * Extends PWElements class and defines a pwe Visual Composer element for vouchers.
 */
class PWElementVoucher extends PWElements {

    /**
     * Constructor method.
     * Calls parent constructor and adds an action for initializing the Visual Composer map.
     */
    public function __construct() {
        parent::__construct();
    }    
    
    /**
     * Static method to generate the HTML output for the PWE Element.
     * Returns the HTML output as a string.
     * 
     * @param array @atts options
     */
    public static function output($atts) {
        $text_color = 'color:' . self::findColor($atts['text_color_manual_hidden'], $atts['text_color'], 'black') . '!important;';
        $btn_text_color = 'color:' . self::findColor($atts['btn_text_color_manual_hidden'], $atts['btn_text_color'], 'white') . '!important; border-width: 0 !important;';
        $btn_color = 'background-color:' . self::findColor($atts['btn_color_manual_hidden'], $atts['btn_color'], self::$accent_color) . '!important;';
        $btn_shadow_color = 'box-shadow: 9px 9px 0px -5px ' . self::findColor($atts['btn_shadow_color_manual_hidden'], $atts['btn_shadow_color'], 'black') . '!important;';
        $btn_border = 'border: 1px solid ' . self::findColor($atts['text_color_manual_hidden'], $atts['text_color'], self::$accent_color) . '!important;';

        $output = '
            <style>
                .pwelement_'.self::$rnd_id.' .pwe-btn {
                    '. $btn_text_color
                    . $btn_color
                    . $btn_shadow_color
                    . $btn_border .'
                }
                .pwelement_'.self::$rnd_id.' .pwe-btn:hover {
                    color: #000000 !important;
                    background-color: #ffffff !important;
                    border: 1px solid #000000 !important;
                }
                .pwe-container-voucher {
                    display:flex;
                    flex-wrap: wrap;
                    justify-content: center;
                }
                @media (max-width:960px) {
                    .pwe-container-voucher {
                        flex-direction: column;
                    }
                }
            </style>
            <div id="PWEvoucher"class="pwe-container-voucher">
                <div class="uncode-single-media-wrapper half-block-padding pwe-min-media-wrapper" style="flex:1;">
                    <div class="image-shadow"><div class="t-entry-visual"><img style="vertical-align: bottom;" src="/wp-content/plugins/PWElements/media/voucher.webp" alt="grafika przykładowego vouchera"/></div></div>
                </div>

                <div class="half-block-padding" style="flex:1;">
                    <div class="heading-text el-text text-centered main-heading-text">
                        <h4 style="' . $text_color . '">'.
                        self::languageChecker(
                            <<<PL
                            ODBIERZ VOUCHER NA ZABUDOWĘ
                            PL,
                            <<<EN
                            RECEIVE A CONSTRUCTION VOUCHER
                            EN
                            )
                        .'</h4>
                    </div>';

                    if (!preg_match('/Mobile|Android|iPhone/i', $_SERVER['HTTP_USER_AGENT'])) {
                        $output .= '<p class="pwe-line-height"  style="' . $text_color . '">' .
                            self::languageChecker(
                                <<<PL
                                    Z naszym kuponem masz pełną swobodę wyboru opcji, które najlepiej odpowiadają Twoim potrzebom. W ofercie znajdują się niestandardowe projekty stoisk, grafika i oznakowanie, podłogi i oświetlenie, meble, sprzęt AV i wiele innych. Wszystko, co musisz zrobić, to okazać nasz kupon przy zakupie, wartość zniżki zostanie uwzględniona w fakturze. Dzięki temu zaoszczędzisz pieniądze, a także zyskasz większą elastyczność i swobodę twórczą.
                                PL,
                                <<<EN
                                    With our coupon, you have complete freedom to choose the options that best suit your needs. We offer pwe booth designs, graphics and signage, flooring and lighting, furniture, AV equipment and much more. All you need to do is present our coupon at the time of purchase, the value of the discount will be included in the invoice. This will save you money and give you more flexibility and creative freedom.
                                EN
                            )
                            . '</p>';
                    }

                    $output .= '<div class="pwe-btn-container">
                        <span>
                            <a class="pwe-link btn pwe-btn"' .
                                self::languageChecker(
                                    <<<PL
                                        href="/kontakt/">Zapytaj o voucher
                                    PL,
                                    <<<EN
                                        href="/en/contact/">Ask for a voucher</a>
                                    EN
                                )
                        . '</a>
                    </div>
                </div>
            </div>';
        
        return $output;
    }
}