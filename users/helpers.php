<?php
  function dd($value)
  {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die();
  }

  function first($arr)
  {
    if(is_array($arr))
    {
      if(count($arr) > 0)
      {
        return array_values($arr)[0];
      }
    }
  }
  function last($arr)
  {
    if(is_array($arr))
    {
      if(count($arr) > 0)
      {
        return array_values($arr)[count($arr) - 1];
      }
    }
  }

  function getElementByKey($key, $array)
  {
    $keysExploded = explode('.', $key);
    foreach ($keysExploded as $keySegment)
    {
      if(!is_array($array))
       return null;
      if(!array_key_exists($keySegment, $array))
      return null;

      $array = $array[$keySegment];
    }

    return $array;
  }
  //
  //
  // $response = [
  //     'place' => [
  //       'location' => [
  //         'bounds' => [
  //           'lat'=>34.233,
  //           'lng'=>64.343
  //         ]
  //       ]
  //     ]
  // ];



  // dd(getElementByKey('place.location.bounds',$response));
