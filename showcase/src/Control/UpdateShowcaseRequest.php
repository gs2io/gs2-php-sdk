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

namespace Gs2\Showcase\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateShowcaseRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateShowcase";

	/** @var string ショーケースの名前 */
	private $showcaseName;

	/** @var string 説明文 */
	private $description;

	/** @var string 公開許可判定 に実行されるGS2-Script */
	private $releaseConditionTriggerScript;

	/** @var string 購入直前 に実行されるGS2-Script */
	private $buyTriggerScript;


	/**
	 * ショーケースの名前を取得
	 *
	 * @return string ショーケースの名前
	 */
	public function getShowcaseName() {
		return $this->showcaseName;
	}

	/**
	 * ショーケースの名前を設定
	 *
	 * @param string $showcaseName ショーケースの名前
	 */
	public function setShowcaseName($showcaseName) {
		$this->showcaseName = $showcaseName;
	}

	/**
	 * ショーケースの名前を設定
	 *
	 * @param string $showcaseName ショーケースの名前
	 * @return UpdateShowcaseRequest
	 */
	public function withShowcaseName($showcaseName): UpdateShowcaseRequest {
		$this->setShowcaseName($showcaseName);
		return $this;
	}

	/**
	 * 説明文を取得
	 *
	 * @return string 説明文
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 * @return UpdateShowcaseRequest
	 */
	public function withDescription($description): UpdateShowcaseRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * 公開許可判定 に実行されるGS2-Scriptを取得
	 *
	 * @return string 公開許可判定 に実行されるGS2-Script
	 */
	public function getReleaseConditionTriggerScript() {
		return $this->releaseConditionTriggerScript;
	}

	/**
	 * 公開許可判定 に実行されるGS2-Scriptを設定
	 *
	 * @param string $releaseConditionTriggerScript 公開許可判定 に実行されるGS2-Script
	 */
	public function setReleaseConditionTriggerScript($releaseConditionTriggerScript) {
		$this->releaseConditionTriggerScript = $releaseConditionTriggerScript;
	}

	/**
	 * 公開許可判定 に実行されるGS2-Scriptを設定
	 *
	 * @param string $releaseConditionTriggerScript 公開許可判定 に実行されるGS2-Script
	 * @return UpdateShowcaseRequest
	 */
	public function withReleaseConditionTriggerScript($releaseConditionTriggerScript): UpdateShowcaseRequest {
		$this->setReleaseConditionTriggerScript($releaseConditionTriggerScript);
		return $this;
	}

	/**
	 * 購入直前 に実行されるGS2-Scriptを取得
	 *
	 * @return string 購入直前 に実行されるGS2-Script
	 */
	public function getBuyTriggerScript() {
		return $this->buyTriggerScript;
	}

	/**
	 * 購入直前 に実行されるGS2-Scriptを設定
	 *
	 * @param string $buyTriggerScript 購入直前 に実行されるGS2-Script
	 */
	public function setBuyTriggerScript($buyTriggerScript) {
		$this->buyTriggerScript = $buyTriggerScript;
	}

	/**
	 * 購入直前 に実行されるGS2-Scriptを設定
	 *
	 * @param string $buyTriggerScript 購入直前 に実行されるGS2-Script
	 * @return UpdateShowcaseRequest
	 */
	public function withBuyTriggerScript($buyTriggerScript): UpdateShowcaseRequest {
		$this->setBuyTriggerScript($buyTriggerScript);
		return $this;
	}

}