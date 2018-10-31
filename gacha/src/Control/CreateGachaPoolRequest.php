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
class CreateGachaPoolRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateGachaPool";

	/** @var string ガチャプール名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string 排出確率を公開するか */
	private $publicDrawRate;

	/** @var string ガチャ一覧の取得を許すか */
	private $allowAccessGachaInfo;

	/** @var string 抽選実行を制限するか */
	private $restrict;

	/** @var string 排出判定時 に実行されるGS2-Script */
	private $drawPrizeTriggerScript;

	/** @var string 排出判定完了時 に実行されるGS2-Script */
	private $drawPrizeDoneTriggerScript;


	/**
	 * ガチャプール名を取得
	 *
	 * @return string ガチャプール名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ガチャプール名を設定
	 *
	 * @param string $name ガチャプール名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ガチャプール名を設定
	 *
	 * @param string $name ガチャプール名
	 * @return CreateGachaPoolRequest
	 */
	public function withName($name): CreateGachaPoolRequest {
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
	 * @return CreateGachaPoolRequest
	 */
	public function withDescription($description): CreateGachaPoolRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * 排出確率を公開するかを取得
	 *
	 * @return string 排出確率を公開するか
	 */
	public function getPublicDrawRate() {
		return $this->publicDrawRate;
	}

	/**
	 * 排出確率を公開するかを設定
	 *
	 * @param string $publicDrawRate 排出確率を公開するか
	 */
	public function setPublicDrawRate($publicDrawRate) {
		$this->publicDrawRate = $publicDrawRate;
	}

	/**
	 * 排出確率を公開するかを設定
	 *
	 * @param string $publicDrawRate 排出確率を公開するか
	 * @return CreateGachaPoolRequest
	 */
	public function withPublicDrawRate($publicDrawRate): CreateGachaPoolRequest {
		$this->setPublicDrawRate($publicDrawRate);
		return $this;
	}

	/**
	 * ガチャ一覧の取得を許すかを取得
	 *
	 * @return string ガチャ一覧の取得を許すか
	 */
	public function getAllowAccessGachaInfo() {
		return $this->allowAccessGachaInfo;
	}

	/**
	 * ガチャ一覧の取得を許すかを設定
	 *
	 * @param string $allowAccessGachaInfo ガチャ一覧の取得を許すか
	 */
	public function setAllowAccessGachaInfo($allowAccessGachaInfo) {
		$this->allowAccessGachaInfo = $allowAccessGachaInfo;
	}

	/**
	 * ガチャ一覧の取得を許すかを設定
	 *
	 * @param string $allowAccessGachaInfo ガチャ一覧の取得を許すか
	 * @return CreateGachaPoolRequest
	 */
	public function withAllowAccessGachaInfo($allowAccessGachaInfo): CreateGachaPoolRequest {
		$this->setAllowAccessGachaInfo($allowAccessGachaInfo);
		return $this;
	}

	/**
	 * 抽選実行を制限するかを取得
	 *
	 * @return string 抽選実行を制限するか
	 */
	public function getRestrict() {
		return $this->restrict;
	}

	/**
	 * 抽選実行を制限するかを設定
	 *
	 * @param string $restrict 抽選実行を制限するか
	 */
	public function setRestrict($restrict) {
		$this->restrict = $restrict;
	}

	/**
	 * 抽選実行を制限するかを設定
	 *
	 * @param string $restrict 抽選実行を制限するか
	 * @return CreateGachaPoolRequest
	 */
	public function withRestrict($restrict): CreateGachaPoolRequest {
		$this->setRestrict($restrict);
		return $this;
	}

	/**
	 * 排出判定時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 排出判定時 に実行されるGS2-Script
	 */
	public function getDrawPrizeTriggerScript() {
		return $this->drawPrizeTriggerScript;
	}

	/**
	 * 排出判定時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $drawPrizeTriggerScript 排出判定時 に実行されるGS2-Script
	 */
	public function setDrawPrizeTriggerScript($drawPrizeTriggerScript) {
		$this->drawPrizeTriggerScript = $drawPrizeTriggerScript;
	}

	/**
	 * 排出判定時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $drawPrizeTriggerScript 排出判定時 に実行されるGS2-Script
	 * @return CreateGachaPoolRequest
	 */
	public function withDrawPrizeTriggerScript($drawPrizeTriggerScript): CreateGachaPoolRequest {
		$this->setDrawPrizeTriggerScript($drawPrizeTriggerScript);
		return $this;
	}

	/**
	 * 排出判定完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 排出判定完了時 に実行されるGS2-Script
	 */
	public function getDrawPrizeDoneTriggerScript() {
		return $this->drawPrizeDoneTriggerScript;
	}

	/**
	 * 排出判定完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $drawPrizeDoneTriggerScript 排出判定完了時 に実行されるGS2-Script
	 */
	public function setDrawPrizeDoneTriggerScript($drawPrizeDoneTriggerScript) {
		$this->drawPrizeDoneTriggerScript = $drawPrizeDoneTriggerScript;
	}

	/**
	 * 排出判定完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $drawPrizeDoneTriggerScript 排出判定完了時 に実行されるGS2-Script
	 * @return CreateGachaPoolRequest
	 */
	public function withDrawPrizeDoneTriggerScript($drawPrizeDoneTriggerScript): CreateGachaPoolRequest {
		$this->setDrawPrizeDoneTriggerScript($drawPrizeDoneTriggerScript);
		return $this;
	}

}