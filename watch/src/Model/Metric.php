<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Watch\Model;

/**
 * メトリック
 *
 * @author Game Server Services, Inc.
 *
 */
class Metric {

	/** @var int タイムスタンプ(エポック秒) */
	private $timestamp;

	/** @var double 値 */
	private $value;

	/**
	 * タイムスタンプ(エポック秒)を取得
	 *
	 * @return int タイムスタンプ(エポック秒)
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * タイムスタンプ(エポック秒)を設定
	 *
	 * @param int $timestamp タイムスタンプ(エポック秒)
	 */
	public function setTimestamp($timestamp) {
		$this->timestamp = $timestamp;
	}

	/**
	 * タイムスタンプ(エポック秒)を設定
	 *
	 * @param int $timestamp タイムスタンプ(エポック秒)
	 * @return self
	 */
	public function withTimestamp($timestamp): self {
		$this->setTimestamp($timestamp);
		return $this;
	}

	/**
	 * 値を取得
	 *
	 * @return double 値
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * 値を設定
	 *
	 * @param double $value 値
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * 値を設定
	 *
	 * @param double $value 値
	 * @return self
	 */
	public function withValue($value): self {
		$this->setValue($value);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Metric
	 */
    static function build(array $array)
    {
        $item = new Metric();
        $item->setTimestamp(isset($array['timestamp']) ? $array['timestamp'] : null);
        $item->setValue(isset($array['value']) ? $array['value'] : null);
        return $item;
    }

}