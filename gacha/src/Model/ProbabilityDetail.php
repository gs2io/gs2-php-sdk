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
 * リソース毎の排出率
 *
 * @author Game Server Services, Inc.
 *
 */
class ProbabilityDetail {

	/** @var string レアリティ名 */
	private $rarityName;

	/** @var string リソースID */
	private $resourceId;

	/** @var float 排出率 */
	private $rate;

	/**
	 * レアリティ名を取得
	 *
	 * @return string レアリティ名
	 */
	public function getRarityName() {
		return $this->rarityName;
	}

	/**
	 * レアリティ名を設定
	 *
	 * @param string $rarityName レアリティ名
	 */
	public function setRarityName($rarityName) {
		$this->rarityName = $rarityName;
	}

	/**
	 * レアリティ名を設定
	 *
	 * @param string $rarityName レアリティ名
	 * @return self
	 */
	public function withRarityName($rarityName): self {
		$this->setRarityName($rarityName);
		return $this;
	}

	/**
	 * リソースIDを取得
	 *
	 * @return string リソースID
	 */
	public function getResourceId() {
		return $this->resourceId;
	}

	/**
	 * リソースIDを設定
	 *
	 * @param string $resourceId リソースID
	 */
	public function setResourceId($resourceId) {
		$this->resourceId = $resourceId;
	}

	/**
	 * リソースIDを設定
	 *
	 * @param string $resourceId リソースID
	 * @return self
	 */
	public function withResourceId($resourceId): self {
		$this->setResourceId($resourceId);
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
	 * @return ProbabilityDetail
	 */
    static function build(array $array)
    {
        $item = new ProbabilityDetail();
        $item->setRarityName(isset($array['rarityName']) ? $array['rarityName'] : null);
        $item->setResourceId(isset($array['resourceId']) ? $array['resourceId'] : null);
        $item->setRate(isset($array['rate']) ? $array['rate'] : null);
        return $item;
    }

}