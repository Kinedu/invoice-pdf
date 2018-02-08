<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\InvoicePDF\Component;

use Kinedu\InvoicePDF\Component;

class Product extends Component
{
    /**
     * @return void
     */
    public function render()
    {
        $this->pdf->createTable([
            'Quantity',
            'Description',
            'Price',
            'Tax',
            'Total',
        ], $this->attr);
    }
}
