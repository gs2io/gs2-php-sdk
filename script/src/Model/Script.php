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

namespace Gs2\Script\Model;

/**
 * スクリプト
 *
 * @author Game Server Services, Inc.
 *
 */
class Script {

	/** @var string スクリプトGRN */
	private $scriptId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string スクリプト名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string スクリプトデータ */
	private $script;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * スクリプトGRNを取得
	 *
	 * @return string スクリプトGRN
	 */
	public function getScriptId() {
		return $this->scriptId;
	}

	/**
	 * スクリプトGRNを設定
	 *
	 * @param string $scriptId スクリプトGRN
	 */
	public function setScriptId($scriptId) {
		$this->scriptId = $scriptId;
	}

	/**
	 * スクリプトGRNを設定
	 *
	 * @param string $scriptId スクリプトGRN
	 * @return self
	 */
	public function withScriptId($scriptId): self {
		$this->setScriptId($scriptId);
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
	 * スクリプト名を取得
	 *
	 * @return string スクリプト名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * スクリプト名を設定
	 *
	 * @param string $name スクリプト名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * スクリプト名を設定
	 *
	 * @param string $name スクリプト名
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
	 * スクリプトデータを取得
	 *
	 * @return string スクリプトデータ
	 */
	public function getScript() {
		return $this->script;
	}

	/**
	 * スクリプトデータを設定
	 *
	 * @param string $script スクリプトデータ
	 */
	public function setScript($script) {
		$this->script = $script;
	}

	/**
	 * スクリプトデータを設定
	 *
	 * @param string $script スクリプトデータ
	 * @return self
	 */
	public function withScript($script): self {
		$this->setScript($script);
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
	 * @return Script
	 */
    static function build(array $array)
    {
        $item = new Script();
        $item->setScriptId(isset($array['scriptId']) ? $array['scriptId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setScript(isset($array['script']) ? $array['script'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}