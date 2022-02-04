
# Merge or combine Two or more PDF in laravel

Hi there in this artical you learn to merge multiple pdf 
using jurosh/pdf-merge package and I write a small code to explain 
how to use this package.


## Install Package

To install this jurosh/pdf-merge Package run command

```bash
  composer require jurosh/pdf-merge
```


## Use Code In Your Controller
```bash
$pdf = new \Jurosh\PDFMerge\PDFMerger;

$a1 = public_path().'\pdf\1.pdf';
$a2 = public_path().'\pdf\2.pdf';
$a3 = public_path().'\pdf\3.pdf';

$pdfMerger->addPDF($a1, 'all');
$pdfMerger->addPDF($a2, 'all');
$pdfMerger->addPDF($a3, 'all');
$pdfMerger->merge();        
$pdfMerger->save("MergeFileName.pdf",'download');
```
## Authors

- [@mdsadique](https://github.com/mohammadsadique)
