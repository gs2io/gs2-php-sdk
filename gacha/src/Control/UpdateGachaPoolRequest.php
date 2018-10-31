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
class UpdateGachaPoolRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateGachaPool";

	/** @var string ガチャプールの名前を指定します。 */
	private $gachaPoolName;

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
	 * @return UpdateGachaPoolRequest
	 */
	public function withGachaPoolName($gachaPoolName): UpdateGachaPoolRequest {
		$this->setGachaPoolName($gachaPoolName);
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
	 * @return UpdateGachaPoolRequest
	 */
	public function withDescription($description): UpdateGachaPoolRequest {
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
	 * @return UpdateGachaPoolRequest
	 */
	public function withPublicDrawRate($publicDrawRate): UpdateGachaPoolRequest {
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
	 * @return UpdateGachaPoolRequest
	 */
	public function withAllowAccessGachaInfo($allowAccessGachaInfo): UpdateGachaPoolRequest {
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
	 * @return UpdateGachaPoolRequest
	 */
	public function withRestrict($restrict): UpdateGachaPoolRequest {
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
	 * @return UpdateGachaPoolRequest
	 */
	public function withDrawPrizeTriggerScript($drawPrizeTriggerScript): UpdateGachaPoolRequest {
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
	 * @return UpdateGachaPoolRequest
	 */
	public function withDrawPrizeDoneTriggerScript($drawPrizeDoneTriggerScript): UpdateGachaPoolRequest {
		$this->setDrawPrizeDoneTriggerScript($drawPrizeDoneTriggerScript);
		return $this;
	}

}