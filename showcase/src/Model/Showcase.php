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

namespace Gs2\Showcase\Model;

/**
 * ショーケース
 *
 * @author Game Server Services, Inc.
 *
 */
class Showcase {

	/** @var string ショーケースGRN */
	private $showcaseId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ショーケース名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string 公開許可判定 に実行されるGS2-Script */
	private $releaseConditionTriggerScript;

	/** @var string 購入直前 に実行されるGS2-Script */
	private $buyTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ショーケースGRNを取得
	 *
	 * @return string ショーケースGRN
	 */
	public function getShowcaseId() {
		return $this->showcaseId;
	}

	/**
	 * ショーケースGRNを設定
	 *
	 * @param string $showcaseId ショーケースGRN
	 */
	public function setShowcaseId($showcaseId) {
		$this->showcaseId = $showcaseId;
	}

	/**
	 * ショーケースGRNを設定
	 *
	 * @param string $showcaseId ショーケースGRN
	 * @return self
	 */
	public function withShowcaseId($showcaseId): self {
		$this->setShowcaseId($showcaseId);
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
	 * @return self
	 */
	public function withReleaseConditionTriggerScript($releaseConditionTriggerScript): self {
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
	 * @return self
	 */
	public function withBuyTriggerScript($buyTriggerScript): self {
		$this->setBuyTriggerScript($buyTriggerScript);
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
	 * @return Showcase
	 */
    static function build(array $array)
    {
        $item = new Showcase();
        $item->setShowcaseId(isset($array['showcaseId']) ? $array['showcaseId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setReleaseConditionTriggerScript(isset($array['releaseConditionTriggerScript']) ? $array['releaseConditionTriggerScript'] : null);
        $item->setBuyTriggerScript(isset($array['buyTriggerScript']) ? $array['buyTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}