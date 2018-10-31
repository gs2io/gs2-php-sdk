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
class DetailProbabilityRequest extends Gs2BasicRequest {

    const FUNCTION = "DetailProbability";

	/** @var string ガチャプールの名前 */
	private $gachaPoolName;

	/** @var string ガチャの名前 */
	private $gachaName;

	/** @var int 何回目の抽選時の抽選確率を取得するか */
	private $drawTime;


	/**
	 * ガチャプールの名前を取得
	 *
	 * @return string ガチャプールの名前
	 */
	public function getGachaPoolName() {
		return $this->gachaPoolName;
	}

	/**
	 * ガチャプールの名前を設定
	 *
	 * @param string $gachaPoolName ガチャプールの名前
	 */
	public function setGachaPoolName($gachaPoolName) {
		$this->gachaPoolName = $gachaPoolName;
	}

	/**
	 * ガチャプールの名前を設定
	 *
	 * @param string $gachaPoolName ガチャプールの名前
	 * @return DetailProbabilityRequest
	 */
	public function withGachaPoolName($gachaPoolName): DetailProbabilityRequest {
		$this->setGachaPoolName($gachaPoolName);
		return $this;
	}

	/**
	 * ガチャの名前を取得
	 *
	 * @return string ガチャの名前
	 */
	public function getGachaName() {
		return $this->gachaName;
	}

	/**
	 * ガチャの名前を設定
	 *
	 * @param string $gachaName ガチャの名前
	 */
	public function setGachaName($gachaName) {
		$this->gachaName = $gachaName;
	}

	/**
	 * ガチャの名前を設定
	 *
	 * @param string $gachaName ガチャの名前
	 * @return DetailProbabilityRequest
	 */
	public function withGachaName($gachaName): DetailProbabilityRequest {
		$this->setGachaName($gachaName);
		return $this;
	}

	/**
	 * 何回目の抽選時の抽選確率を取得するかを取得
	 *
	 * @return int 何回目の抽選時の抽選確率を取得するか
	 */
	public function getDrawTime() {
		return $this->drawTime;
	}

	/**
	 * 何回目の抽選時の抽選確率を取得するかを設定
	 *
	 * @param int $drawTime 何回目の抽選時の抽選確率を取得するか
	 */
	public function setDrawTime($drawTime) {
		$this->drawTime = $drawTime;
	}

	/**
	 * 何回目の抽選時の抽選確率を取得するかを設定
	 *
	 * @param int $drawTime 何回目の抽選時の抽選確率を取得するか
	 * @return DetailProbabilityRequest
	 */
	public function withDrawTime($drawTime): DetailProbabilityRequest {
		$this->setDrawTime($drawTime);
		return $this;
	}

}