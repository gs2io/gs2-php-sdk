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

namespace Gs2\Gacha\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateRarityMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateRarityMaster";

	/** @var string ガチャプールの名前を指定します。 */
	private $gachaPoolName;

	/** @var string 排出確率テーブルの名前を指定します。 */
	private $prizeTableName;

	/** @var string 景品レアリティの名前を指定します。 */
	private $rarityName;

	/** @var int 排出重み */
	private $weight;


	/**
	 * ガチャプールの名前を指定します。を取得
	 *
	 * @return string ガチャプールの名前を指定します。
	 */
	public function getGachaPoolName() {
		return $this->gachaPoolName;
	}

	/**
	 * ガチャプールの名前を指定します。を設定
	 *
	 * @param string $gachaPoolName ガチャプールの名前を指定します。
	 */
	public function setGachaPoolName($gachaPoolName) {
		$this->gachaPoolName = $gachaPoolName;
	}

	/**
	 * ガチャプールの名前を指定します。を設定
	 *
	 * @param string $gachaPoolName ガチャプールの名前を指定します。
	 * @return UpdateRarityMasterRequest
	 */
	public function withGachaPoolName($gachaPoolName): UpdateRarityMasterRequest {
		$this->setGachaPoolName($gachaPoolName);
		return $this;
	}

	/**
	 * 排出確率テーブルの名前を指定します。を取得
	 *
	 * @return string 排出確率テーブルの名前を指定します。
	 */
	public function getPrizeTableName() {
		return $this->prizeTableName;
	}

	/**
	 * 排出確率テーブルの名前を指定します。を設定
	 *
	 * @param string $prizeTableName 排出確率テーブルの名前を指定します。
	 */
	public function setPrizeTableName($prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}

	/**
	 * 排出確率テーブルの名前を指定します。を設定
	 *
	 * @param string $prizeTableName 排出確率テーブルの名前を指定します。
	 * @return UpdateRarityMasterRequest
	 */
	public function withPrizeTableName($prizeTableName): UpdateRarityMasterRequest {
		$this->setPrizeTableName($prizeTableName);
		return $this;
	}

	/**
	 * 景品レアリティの名前を指定します。を取得
	 *
	 * @return string 景品レアリティの名前を指定します。
	 */
	public function getRarityName() {
		return $this->rarityName;
	}

	/**
	 * 景品レアリティの名前を指定します。を設定
	 *
	 * @param string $rarityName 景品レアリティの名前を指定します。
	 */
	public function setRarityName($rarityName) {
		$this->rarityName = $rarityName;
	}

	/**
	 * 景品レアリティの名前を指定します。を設定
	 *
	 * @param string $rarityName 景品レアリティの名前を指定します。
	 * @return UpdateRarityMasterRequest
	 */
	public function withRarityName($rarityName): UpdateRarityMasterRequest {
		$this->setRarityName($rarityName);
		return $this;
	}

	/**
	 * 排出重みを取得
	 *
	 * @return int 排出重み
	 */
	public function getWeight() {
		return $this->weight;
	}

	/**
	 * 排出重みを設定
	 *
	 * @param int $weight 排出重み
	 */
	public function setWeight($weight) {
		$this->weight = $weight;
	}

	/**
	 * 排出重みを設定
	 *
	 * @param int $weight 排出重み
	 * @return UpdateRarityMasterRequest
	 */
	public function withWeight($weight): UpdateRarityMasterRequest {
		$this->setWeight($weight);
		return $this;
	}

}