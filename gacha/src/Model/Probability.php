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

namespace Gs2\Gacha\Model;

/**
 * レアリティ毎の排出率
 *
 * @author Game Server Services, Inc.
 *
 */
class Probability {

	/** @var string レアリティ名 */
	private $name;

	/** @var float 排出率 */
	private $rate;

	/**
	 * レアリティ名を取得
	 *
	 * @return string レアリティ名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * レアリティ名を設定
	 *
	 * @param string $name レアリティ名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * レアリティ名を設定
	 *
	 * @param string $name レアリティ名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * 排出率を取得
	 *
	 * @return float 排出率
	 */
	public function getRate() {
		return $this->rate;
	}

	/**
	 * 排出率を設定
	 *
	 * @param float $rate 排出率
	 */
	public function setRate($rate) {
		$this->rate = $rate;
	}

	/**
	 * 排出率を設定
	 *
	 * @param float $rate 排出率
	 * @return self
	 */
	public function withRate($rate): self {
		$this->setRate($rate);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Probability
	 */
    static function build(array $array)
    {
        $item = new Probability();
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setRate(isset($array['rate']) ? $array['rate'] : null);
        return $item;
    }

}