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

namespace Gs2\Stamina\Control;

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class ChangeStaminaRequest extends Gs2UserRequest {

    const FUNCTION = "ChangeStamina";

	/** @var string スタミナプールの名前を指定します。 */
	private $staminaPoolName;

	/** @var int スタミナの増減量 */
	private $variation;

	/** @var int スタミナの最大値 */
	private $maxValue;

	/** @var bool スタミナを回復する際に最大値を超えて回復するか */
	private $overflow;


	/**
	 * スタミナプールの名前を指定します。を取得
	 *
	 * @return string スタミナプールの名前を指定します。
	 */
	public function getStaminaPoolName() {
		return $this->staminaPoolName;
	}

	/**
	 * スタミナプールの名前を指定します。を設定
	 *
	 * @param string $staminaPoolName スタミナプールの名前を指定します。
	 */
	public function setStaminaPoolName($staminaPoolName) {
		$this->staminaPoolName = $staminaPoolName;
	}

	/**
	 * スタミナプールの名前を指定します。を設定
	 *
	 * @param string $staminaPoolName スタミナプールの名前を指定します。
	 * @return ChangeStaminaRequest
	 */
	public function withStaminaPoolName($staminaPoolName): ChangeStaminaRequest {
		$this->setStaminaPoolName($staminaPoolName);
		return $this;
	}

	/**
	 * スタミナの増減量を取得
	 *
	 * @return int スタミナの増減量
	 */
	public function getVariation() {
		return $this->variation;
	}

	/**
	 * スタミナの増減量を設定
	 *
	 * @param int $variation スタミナの増減量
	 */
	public function setVariation($variation) {
		$this->variation = $variation;
	}

	/**
	 * スタミナの増減量を設定
	 *
	 * @param int $variation スタミナの増減量
	 * @return ChangeStaminaRequest
	 */
	public function withVariation($variation): ChangeStaminaRequest {
		$this->setVariation($variation);
		return $this;
	}

	/**
	 * スタミナの最大値を取得
	 *
	 * @return int スタミナの最大値
	 */
	public function getMaxValue() {
		return $this->maxValue;
	}

	/**
	 * スタミナの最大値を設定
	 *
	 * @param int $maxValue スタミナの最大値
	 */
	public function setMaxValue($maxValue) {
		$this->maxValue = $maxValue;
	}

	/**
	 * スタミナの最大値を設定
	 *
	 * @param int $maxValue スタミナの最大値
	 * @return ChangeStaminaRequest
	 */
	public function withMaxValue($maxValue): ChangeStaminaRequest {
		$this->setMaxValue($maxValue);
		return $this;
	}

	/**
	 * スタミナを回復する際に最大値を超えて回復するかを取得
	 *
	 * @return bool スタミナを回復する際に最大値を超えて回復するか
	 */
	public function getOverflow() {
		return $this->overflow;
	}

	/**
	 * スタミナを回復する際に最大値を超えて回復するかを設定
	 *
	 * @param bool $overflow スタミナを回復する際に最大値を超えて回復するか
	 */
	public function setOverflow($overflow) {
		$this->overflow = $overflow;
	}

	/**
	 * スタミナを回復する際に最大値を超えて回復するかを設定
	 *
	 * @param bool $overflow スタミナを回復する際に最大値を超えて回復するか
	 * @return ChangeStaminaRequest
	 */
	public function withOverflow($overflow): ChangeStaminaRequest {
		$this->setOverflow($overflow);
		return $this;
	}

}