<?php
class Test
{
  function __construct(public $string)
  {
    $this->string = $string;
    $this->count();
  }
    
  function count()
  {
    $brackets = [')'=>'(', ']'=>'[', '}'=>'{'];
    $counter;
    $stack = [];
    for ($i = 0; $i < strlen($this->string); $i++)
    {
      echo $char = $this->string[$i];
      if (in_array($char, array_values($brackets)))
      {
        array_push($stack, $char);
      }
      elseif (in_array($char, array_keys($brackets)))
      {
        if (empty($stack))
        {
          break;
        }
        else
        {
          array_pop($stack);
        }
      }
      $counter = $i + 1;
    }
    if ($counter == strlen($this->string) && empty($stack))
    {
      echo PHP_EOL.'True';
    }
    else
    {
      echo PHP_EOL.'False';
    }
  }
}

$test = new Test('{lajkdhf{adfa}{}adfasdfadf{}}');
?>