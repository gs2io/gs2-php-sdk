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
 * 排出確率テーブル
 *
 * @author Game Server Services, Inc.
 *
 */
class PrizeTableMaster {

	/** @var string 排出確率テーブルGRN */
	private $prizeTableId;

	/** @var string 排出確率テーブル名 */
	private $name;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 排出確率テーブルGRNを取得
	 *
	 * @return string 排出確率テーブルGRN
	 */
	public function getPrizeTableId() {
		return $this->prizeTableId;
	}

	/**
	 * 排出確率テーブルGRNを設定
	 *
	 * @param string $prizeTableId 排出確率テーブルGRN
	 */
	public function setPrizeTableId($prizeTableId) {
		$this->prizeTableId = $prizeTableId;
	}

	/**
	 * 排出確率テーブルGRNを設定
	 *
	 * @param string $prizeTableId 排出確率テーブルGRN
	 * @return self
	 */
	public function withPrizeTableId($prizeTableId): self {
		$this->setPrizeTableId($prizeTableId);
		return $this;
	}

	/**
	 * 排出確率テーブル名を取得
	 *
	 * @return string 排出確率テーブル名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 排出確率テーブル名を設定
	 *
	 * @param string $name 排出確率テーブル名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 排出確率テーブル名を設定
	 *
	 * @param string $name 排出確率テーブル名
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
	 * @return PrizeTableMaster
	 */
    static function build(array $array)
    {
        $item = new PrizeTableMaster();
        $item->setPrizeTableId(isset($array['prizeTableId']) ? $array['prizeTableId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}