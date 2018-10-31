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
 * ガチャプール
 *
 * @author Game Server Services, Inc.
 *
 */
class GachaPool {

	/** @var string ガチャプールGRN */
	private $gachaPoolId;

	/** @var string オーナーID */
	private $ownerId;

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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ガチャプールGRNを取得
	 *
	 * @return string ガチャプールGRN
	 */
	public function getGachaPoolId() {
		return $this->gachaPoolId;
	}

	/**
	 * ガチャプールGRNを設定
	 *
	 * @param string $gachaPoolId ガチャプールGRN
	 */
	public function setGachaPoolId($gachaPoolId) {
		$this->gachaPoolId = $gachaPoolId;
	}

	/**
	 * ガチャプールGRNを設定
	 *
	 * @param string $gachaPoolId ガチャプールGRN
	 * @return self
	 */
	public function withGachaPoolId($gachaPoolId): self {
		$this->setGachaPoolId($gachaPoolId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

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
	 * @return self
	 */
	public function withName($name): self {
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
	 * @return self
	 */
	public function withDescription($description): self {
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
	 * @return self
	 */
	public function withPublicDrawRate($publicDrawRate): self {
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
	 * @return self
	 */
	public function withAllowAccessGachaInfo($allowAccessGachaInfo): self {
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
	 * @return self
	 */
	public function withRestrict($restrict): self {
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
	 * @return self
	 */
	public function withDrawPrizeTriggerScript($drawPrizeTriggerScript): self {
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
	 * @return self
	 */
	public function withDrawPrizeDoneTriggerScript($drawPrizeDoneTriggerScript): self {
		$this->setDrawPrizeDoneTriggerScript($drawPrizeDoneTriggerScript);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return GachaPool
	 */
    static function build(array $array)
    {
        $item = new GachaPool();
        $item->setGachaPoolId(isset($array['gachaPoolId']) ? $array['gachaPoolId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setPublicDrawRate(isset($array['publicDrawRate']) ? $array['publicDrawRate'] : null);
        $item->setAllowAccessGachaInfo(isset($array['allowAccessGachaInfo']) ? $array['allowAccessGachaInfo'] : null);
        $item->setRestrict(isset($array['restrict']) ? $array['restrict'] : null);
        $item->setDrawPrizeTriggerScript(isset($array['drawPrizeTriggerScript']) ? $array['drawPrizeTriggerScript'] : null);
        $item->setDrawPrizeDoneTriggerScript(isset($array['drawPrizeDoneTriggerScript']) ? $array['drawPrizeDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}