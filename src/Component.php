<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\InvoicePDF;

use Kinedu\InvoicePDF\PDF;

class Component
{
    /**
     * PDF instance.
     *
     * @var \Kinedu\InvoicePDF\PDF
     */
    protected $pdf;

    /**
     *
     *
     * @var array
     */
    protected $attr;

    /**
     * Create a new component instance.
     *
     * @param \Kinedu\InvoicePDF\PDF $pdf
     * @param array $attr
     */
    public function __construct(PDF $pdf, array $attr)
    {
        $this->pdf = $pdf;
        $this->attr = $attr;
    }
}
