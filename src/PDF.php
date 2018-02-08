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

use FPDF;

class PDF extends FPDF
{
    /**
     * @param array $header
     * @param array $data
     *
     * @return void
     */
    public function createTable(array $header, array $data)
    {
        $this->SetFillColor(27, 117, 187);
        $this->SetTextColor(255);
        $this->SetDrawColor(255);
        $this->SetLineWidth(0.7);

        $headerWidth = $this->getFullWidth() / sizeof($header);
        $headerHeight = 8;

        foreach ($header as $col) {
            $this->Cell($headerWidth, $headerHeight, $col, 1, 0, 'C', true);
        }

        $this->Ln();
        $this->SetTextColor(0);
        $this->SetFillColor(244, 244, 244);

        for ($i = 0; $i < sizeof($data); $i++) {
            foreach ($data[$i] as $col) {
                foreach ($col as $value) {
                    $this->Cell($headerWidth, $headerHeight, $value, 'LR', 0, 'L', $fill);
                }
                $this->Ln();
                $fill = !$fill;
            }
        }
    }

    /**
     * @return integer
     */
    public function getFullWidth()
    {
        return $this->GetPageWidth() - $this->lMargin - $this->rMargin;
    }
}
