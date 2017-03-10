<?php

namespace Kosik\Forms\Controls;

use Nette\Forms\Controls\TextInput;

/**
 * Numeric input form control.
 *
 * @see http://plentz.github.io/jquery-maskmoney/
 *
 * @author Tomáš Čepička <tomas.cepicka@kosik.cz>
 * @package Kosik\Forms\Controls
 */
class NumericInput extends TextInput
{
    const DEFAULT_PRECISION = 2;

    const DEFAULT_THOUSAND_SEPARATOR = ' ';

    const DEFAULT_DECIMAL_SEPARATOR = ',';

    const DEFAULT_AFFIXES_STAY = TRUE;

    const DEFAULT_ALLOW_ZERO = TRUE;

    const DEFAULT_ALLOW_NEGATIVE = FALSE;


    const DATA_PREFIX = 'maskmoney-';

    const CSS_CLASS = 'nette-numeric';


    /** @var int| */
    private $precision;

    /** @var string| */
    private $thousandSeparator;

    /** @var string| */
    private $decimalSeparator;

    /** @var string|null */
    private $prefix;

    /** @var string|null */
    private $suffix;

    /** @var bool|null */
    private $affixesStay;

    /** @var bool|null */
    private $allowZero;

    /** @var bool|null */
    private $allowNegative;


    /**
     * Creates a new instance of NumericInput.
     *
     * @param string|null $label
     * @param int|null $maxLength
     */
    public function __construct($label = NULL, $maxLength = NULL)
    {
        parent::__construct($label, $maxLength);

    }


    public function getControl()
    {
        $control = parent::getControl();

        $control->class(self::CSS_CLASS);

        $control->data(array(
            self::DATA_PREFIX . 'precision' => $this->getPrecision(),
            self::DATA_PREFIX . 'thousand-separator' => $this->getThousandSeparator(),
            self::DATA_PREFIX . 'decimal-separator' => $this->getDecimalSeparator(),
            self::DATA_PREFIX . 'affixes-stay' => $this->getAffixesStay(),
            self::DATA_PREFIX . 'allow-zero' => $this->getAllowZero(),
            self::DATA_PREFIX . 'allow-negative' => $this->getAllowNegative()
        ));

        if($this->hasPrefix()) {
            $control->data(self::DATA_PREFIX . 'prefix', $this->getPrefix());
        }

        if($this->hasSuffix()) {
            $control->data(self::DATA_PREFIX . 'suffix', $this->getSuffix());
        }

        return $control;
    }


    /**
     * Sets the decimal precision of the value.
     *
     * @param int $value
     * @return self
     */
    public function setPrecision(int $value) : self
    {
        $this->precision = $value;
        return $this;
    }

    /**
     * Returns the decimal precision of the value.
     *
     * @return int
     */
    public function getPrecision() : int
    {
        return $this->precision ?? self::DEFAULT_PRECISION;
    }


    /**
     * Sets the thousands separator string.
     *
     * @param string $value
     * @return self
     */
    public function setThousandSeparator(string $value) : self
    {
        $this->thousandSeparator = $value;
        return $this;
    }

    /**
     * Returns the thousands separator string.
     *
     * @return string
     */
    public function getThousandSeparator() : string
    {
        return $this->thousandSeparator ?? self::DEFAULT_THOUSAND_SEPARATOR;
    }


    /**
     * Sets the decimal separator string.
     *
     * @param string $value
     * @return self
     */
    public function setDecimalSeparator(string $value) : self
    {
        $this->decimalSeparator = $value;
        return $this;
    }

    /**
     * Returns the decimal separator string.
     *
     * @return string
     */
    public function getDecimalSeparator() : string
    {
        return $this->decimalSeparator ?? self::DEFAULT_DECIMAL_SEPARATOR;
    }


    /**
     * Checks if the control has a prefix string set.
     *
     * @return bool
     */
    public function hasPrefix() : bool
    {
        return $this->prefix !== NULL;
    }

    /**
     * Sets the prefix string.
     *
     * @param string $value
     * @return self
     */
    public function setPrefix(string $value) : self
    {
        $this->prefix = $value;
        return $this;
    }

    /**
     * Returns the prefix string, or NULL if not set.
     *
     * @return string|null
     */
    public function getPrefix()
    {
        return $this->prefix;
    }


    /**
     * Checks if the control has a suffix string set.
     *
     * @return bool
     */
    public function hasSuffix() : bool
    {
        return $this->suffix !== NULL;
    }

    /**
     * Sets the suffix string.
     *
     * @param string $value
     * @return self
     */
    public function setSuffix(string $value) : self
    {
        $this->suffix = $value;
        return $this;
    }

    /**
     * Returns the suffix string, or NULL if not set.
     *
     * @return string|null
     */
    public function getSuffix()
    {
        return $this->suffix;
    }


    /**
     * Sets a value indicating if the affixes stay.
     *
     * @param bool $value
     * @return self
     */
    public function setAffixesStay(bool $value = TRUE) : self
    {
        $this->affixesStay = $value;
        return $this;
    }

    /**
     * Returns a value indicating if the affixes stay.
     *
     * @return bool
     */
    public function getAffixesStay() : bool
    {
        return $this->affixesStay ?? self::DEFAULT_AFFIXES_STAY;
    }


    /**
     * Sets a value indicating if a zero value is allowed.
     *
     * @param bool $value
     * @return self
     */
    public function setAllowZero(bool $value = TRUE) : self
    {
        $this->allowZero = $value;
        return $this;
    }

    /**
     * Returns a value indicating if a zero value is allowed.
     *
     * @return bool
     */
    public function getAllowZero() : bool
    {
        return $this->allowZero ?? self::DEFAULT_ALLOW_ZERO;
    }


    /**
     * Sets a value indicating if a negative value is allowed.
     *
     * @param bool $value
     * @return self
     */
    public function setAllowNegative(bool $value = TRUE) : self
    {
        $this->allowNegative = $value;
        return $this;
    }

    /**
     * Returns a value indicating if a negative value is allowed.
     *
     * @return bool
     */
    public function getAllowNegative() : bool
    {
        return $this->allowNegative ?? self::DEFAULT_ALLOW_NEGATIVE;
    }
}