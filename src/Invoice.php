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
use Exception;

class Invoice
{
    /**
     * @var array
     */
    public $components = [
        'product' => \Kinedu\InvoicePDF\Component\Product::class,
    ];

    /**
     * PDF instance.
     *
     * @var \Kinedu\InvoicePDF\PDF
     */
    protected $pdf;

    /**
     * Create a new invoice instance.
     *
     * @param array $attr
     */
    public function __construct(array $attr)
    {
        $this->pdf = new PDF();
        $this->pdf->SetFont('Helvetica');
        $this->pdf->SetFontSize(10);
        $this->pdf->AddPage();
    }

    /**
     * @param string $filename
     *
     * @return void
     */
    public function save(string $filename)
    {
        $this->pdf->Output('F', $filename);
    }

    /**
     * @param string $method
     * @param array $arguments
     */
    public function __call(string $method, array $arguments)
    {
        $prefix = 'add';

        if ((substr($method, 0, 3) === $prefix)) {
            $name = substr($method, strlen($prefix));
            $name = strtolower($name);

            if ($component = $this->components[$name]) {
                $c = new $component($this->pdf, $arguments);

                $c->render();
            } else {
                throw new Exception("This method doesn't exist");
            }
        }
    }
}
