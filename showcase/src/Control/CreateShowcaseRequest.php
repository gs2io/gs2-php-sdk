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
class CreateShowcaseRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateShowcase";

	/** @var string ショーケース名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string 公開許可判定 に実行されるGS2-Script */
	private $releaseConditionTriggerScript;

	/** @var string 購入直前 に実行されるGS2-Script */
	private $buyTriggerScript;


	/**
	 * ショーケース名を取得
	 *
	 * @return string ショーケース名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ショーケース名を設定
	 *
	 * @param string $name ショーケース名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ショーケース名を設定
	 *
	 * @param string $name ショーケース名
	 * @return CreateShowcaseRequest
	 */
	public function withName($name): CreateShowcaseRequest {
		$this->setName($name);
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
	 * @return CreateShowcaseRequest
	 */
	public function withDescription($description): CreateShowcaseRequest {
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
	 * @return CreateShowcaseRequest
	 */
	public function withReleaseConditionTriggerScript($releaseConditionTriggerScript): CreateShowcaseRequest {
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
	 * @return CreateShowcaseRequest
	 */
	public function withBuyTriggerScript($buyTriggerScript): CreateShowcaseRequest {
		$this->setBuyTriggerScript($buyTriggerScript);
		return $this;
	}

}