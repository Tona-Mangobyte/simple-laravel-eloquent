<?php

use PHPUnit\Framework\TestCase;

class SimpleTreeTest extends TestCase
{

    public function testSimpleTreeTest() {
        $categories = array(
            array('id' => 1,  'parent' => '0', 'name' => 'Category A'),
            array('id' => 2,  'parent' => '0', 'name' => 'Category B'),
            array('id' => 3,  'parent' => '0', 'name' => 'Category C'),
            array('id' => 4,  'parent' => '0', 'name' => 'Category D'),
            array('id' => 5,  'parent' => '0', 'name' => 'Category E'),
            array('id' => 6,  'parent' => '2', 'name' => 'Subcategory F'),
            array('id' => 7,  'parent' => '2', 'name' => 'Subcategory G'),
            array('id' => 8,  'parent' => '3', 'name' => 'Subcategory H'),
            array('id' => 9,  'parent' => '4', 'name' => 'Subcategory I'),
            array('id' => 10, 'parent' => '9', 'name' => 'Subcategory J'),
        );

        $result = $this->generateTree($categories);
        print_r(count($result));
        $this->assertCount(5, $result);
    }

    private function generateTree(array &$elements, $parentId = 0): array {

        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent'] == $parentId) {
                $children = $this->generateTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[$element['id']] = $element;
            }
        }
        return $branch;
    }
}
