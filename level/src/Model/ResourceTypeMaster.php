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

namespace Gs2\Level\Model;

/**
 * リソースタイプ
 *
 * @author Game Server Services, Inc.
 *
 */
class ResourceTypeMaster {

	/** @var string リソースタイプGRN */
	private $resourceTypeId;

	/** @var string リソースタイプ名 */
	private $name;

	/** @var string メタデータ */
	private $meta;

	/** @var string レベルテーブル名 */
	private $levelTableName;

	/** @var long デフォルト取得済み経験値 */
	private $defaultExperience;

	/** @var int デフォルトレベルキャップ */
	private $defaultLevelCap;

	/** @var int 最大レベルキャップ */
	private $maxLevelCap;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * リソースタイプGRNを取得
	 *
	 * @return string リソースタイプGRN
	 */
	public function getResourceTypeId() {
		return $this->resourceTypeId;
	}

	/**
	 * リソースタイプGRNを設定
	 *
	 * @param string $resourceTypeId リソースタイプGRN
	 */
	public function setResourceTypeId($resourceTypeId) {
		$this->resourceTypeId = $resourceTypeId;
	}

	/**
	 * リソースタイプGRNを設定
	 *
	 * @param string $resourceTypeId リソースタイプGRN
	 * @return self
	 */
	public function withResourceTypeId($resourceTypeId): self {
		$this->setResourceTypeId($resourceTypeId);
		return $this;
	}

	/**
	 * リソースタイプ名を取得
	 *
	 * @return string リソースタイプ名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * リソースタイプ名を設定
	 *
	 * @param string $name リソースタイプ名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * リソースタイプ名を設定
	 *
	 * @param string $name リソースタイプ名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * メタデータを取得
	 *
	 * @return string メタデータ
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 * @return self
	 */
	public function withMeta($meta): self {
		$this->setMeta($meta);
		return $this;
	}

	/**
	 * レベルテーブル名を取得
	 *
	 * @return string レベルテーブル名
	 */
	public function getLevelTableName() {
		return $this->levelTableName;
	}

	/**
	 * レベルテーブル名を設定
	 *
	 * @param string $levelTableName レベルテーブル名
	 */
	public function setLevelTableName($levelTableName) {
		$this->levelTableName = $levelTableName;
	}

	/**
	 * レベルテーブル名を設定
	 *
	 * @param string $levelTableName レベルテーブル名
	 * @return self
	 */
	public function withLevelTableName($levelTableName): self {
		$this->setLevelTableName($levelTableName);
		return $this;
	}

	/**
	 * デフォルト取得済み経験値を取得
	 *
	 * @return long デフォルト取得済み経験値
	 */
	public function getDefaultExperience() {
		return $this->defaultExperience;
	}

	/**
	 * デフォルト取得済み経験値を設定
	 *
	 * @param long $defaultExperience デフォルト取得済み経験値
	 */
	public function setDefaultExperience($defaultExperience) {
		$this->defaultExperience = $defaultExperience;
	}

	/**
	 * デフォルト取得済み経験値を設定
	 *
	 * @param long $defaultExperience デフォルト取得済み経験値
	 * @return self
	 */
	public function withDefaultExperience($defaultExperience): self {
		$this->setDefaultExperience($defaultExperience);
		return $this;
	}

	/**
	 * デフォルトレベルキャップを取得
	 *
	 * @return int デフォルトレベルキャップ
	 */
	public function getDefaultLevelCap() {
		return $this->defaultLevelCap;
	}

	/**
	 * デフォルトレベルキャップを設定
	 *
	 * @param int $defaultLevelCap デフォルトレベルキャップ
	 */
	public function setDefaultLevelCap($defaultLevelCap) {
		$this->defaultLevelCap = $defaultLevelCap;
	}

	/**
	 * デフォルトレベルキャップを設定
	 *
	 * @param int $defaultLevelCap デフォルトレベルキャップ
	 * @return self
	 */
	public function withDefaultLevelCap($defaultLevelCap): self {
		$this->setDefaultLevelCap($defaultLevelCap);
		return $this;
	}

	/**
	 * 最大レベルキャップを取得
	 *
	 * @return int 最大レベルキャップ
	 */
	public function getMaxLevelCap() {
		return $this->maxLevelCap;
	}

	/**
	 * 最大レベルキャップを設定
	 *
	 * @param int $maxLevelCap 最大レベルキャップ
	 */
	public function setMaxLevelCap($maxLevelCap) {
		$this->maxLevelCap = $maxLevelCap;
	}

	/**
	 * 最大レベルキャップを設定
	 *
	 * @param int $maxLevelCap 最大レベルキャップ
	 * @return self
	 */
	public function withMaxLevelCap($maxLevelCap): self {
		$this->setMaxLevelCap($maxLevelCap);
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
	 * @return ResourceTypeMaster
	 */
    static function build(array $array)
    {
        $item = new ResourceTypeMaster();
        $item->setResourceTypeId(isset($array['resourceTypeId']) ? $array['resourceTypeId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setLevelTableName(isset($array['levelTableName']) ? $array['levelTableName'] : null);
        $item->setDefaultExperience(isset($array['defaultExperience']) ? $array['defaultExperience'] : null);
        $item->setDefaultLevelCap(isset($array['defaultLevelCap']) ? $array['defaultLevelCap'] : null);
        $item->setMaxLevelCap(isset($array['maxLevelCap']) ? $array['maxLevelCap'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}