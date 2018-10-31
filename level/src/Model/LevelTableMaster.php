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
 * レベルテーブル
 *
 * @author Game Server Services, Inc.
 *
 */
class LevelTableMaster {

	/** @var string レベルテーブルGRN */
	private $levelTableId;

	/** @var string レベルテーブル名 */
	private $name;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * レベルテーブルGRNを取得
	 *
	 * @return string レベルテーブルGRN
	 */
	public function getLevelTableId() {
		return $this->levelTableId;
	}

	/**
	 * レベルテーブルGRNを設定
	 *
	 * @param string $levelTableId レベルテーブルGRN
	 */
	public function setLevelTableId($levelTableId) {
		$this->levelTableId = $levelTableId;
	}

	/**
	 * レベルテーブルGRNを設定
	 *
	 * @param string $levelTableId レベルテーブルGRN
	 * @return self
	 */
	public function withLevelTableId($levelTableId): self {
		$this->setLevelTableId($levelTableId);
		return $this;
	}

	/**
	 * レベルテーブル名を取得
	 *
	 * @return string レベルテーブル名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * レベルテーブル名を設定
	 *
	 * @param string $name レベルテーブル名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * レベルテーブル名を設定
	 *
	 * @param string $name レベルテーブル名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
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
	 * @return LevelTableMaster
	 */
    static function build(array $array)
    {
        $item = new LevelTableMaster();
        $item->setLevelTableId(isset($array['levelTableId']) ? $array['levelTableId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}