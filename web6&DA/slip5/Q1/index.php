<?php 

$str =<<<XML
    <xml version='1.0' encoding="UTF-8"/>
   <Items>
    <Item>
        <Name>Smartphone</Name>
        <Rate>500</Rate>
        <Quantity>10</Quantity>
    </Item>
    <Item>
        <Name>Laptop</Name>
        <Rate>1000</Rate>
        <Quantity>5</Quantity>
    </Item>
    <Item>
        <Name>Headphones</Name>
        <Rate>50</Rate>
        <Quantity>20</Quantity>
    </Item>
    <Item>
        <Name>Keyboard</Name>
        <Rate>20</Rate>
        <Quantity>15</Quantity>
    </Item>
    <Item>
        <Name>Mouse</Name>
        <Rate>10</Rate>
        <Quantity>30</Quantity>
    </Item>
</Items>

XML;


$fname = "./ Item.xml";
$fp = fopen($fname , "w+");
fwrite($fp , $str);
fclose($fp);

echo 'Created filename is : '.$fname;
?>