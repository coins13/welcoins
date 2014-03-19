<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.JsonManager
 */

namespace Welcoins;

class JsonManager
{
  const AUTO_INCREMENT = '_AUTO_';

  private $sheetPath = null;
  private $mode = null;
  private $handle = null;
  private $recordName = null;
  private $data;

  public function __construct($sheetPath)
  {
    $this->sheetPath = $sheetPath;
  }

  public function __set($key, $value)
  {
    $this->data[$key] = $value;
  }

  public function __get($key)
  {
    return $this->data[$key];
  }

  public function set($value)
  {
    $this->data = $value;
  }

  public function create($recordName)
  {
    if ($this->mode === 'create')
      throw new \RuntimeException('This JSON manager has already been create mode.');

    $this->recordName = $recordName;
    $this->mode = 'create';
  }

  public function modify($recordName)
  {
    if ($this->mode === 'modify')
      throw new \RuntimeException('This JSON manager has already been modify mode.');

    $this->recordName = $recordName;
    $this->mode = 'modify';
  }

  public function save()
  {
    if (is_null($this->mode))
      throw new \RuntimeException('Before saving a record, you must specify mode for JSON manager.');

    $json = $this->open();

    if ($this->mode === 'create' && $this->recordName === self::AUTO_INCREMENT) {
      $recordName = $json->meta->length + 1;
      $json->meta->length++;
    } else {
      $recordName = $this->recordName;
    }

    $json->records->{$recordName} = $this->data;
    $json->meta->update = date('Y/m/d');

    $this->close($json);
  }

  public function read()
  {
    $records = $this->open()->records;
    $this->close();
    return $records;
  }

  private function open()
  {
    $this->handle = fopen($this->sheetPath, 'ab+'); 

    if (!flock($this->handle, LOCK_EX))
      throw new \RuntimeException('Could not lock the data sheet: ' .$this->sheetPath);

    $json = json_decode(fread($this->handle, filesize($this->sheetPath)));

    return $json;
  }

  private function close($json = null)
  {
    if (!is_null($json)) {
      ftruncate($this->handle, 0);
      fwrite($this->handle, json_encode($json));
    }

    flock($this->handle, LOCK_UN);
    fclose($this->handle);
  }
}
