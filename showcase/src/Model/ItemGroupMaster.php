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
 * 商品グループ
 *
 * @author Game Server Services, Inc.
 *
 */
class ItemGroupMaster {

	/** @var string 商品グループGRN */
	private $itemGroupId;

	/** @var string 商品グループ名 */
	private $name;

	/** @var array 販売している商品名のリスト */
	private $itemNames;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 商品グループGRNを取得
	 *
	 * @return string 商品グループGRN
	 */
	public function getItemGroupId() {
		return $this->itemGroupId;
	}

	/**
	 * 商品グループGRNを設定
	 *
	 * @param string $itemGroupId 商品グループGRN
	 */
	public function setItemGroupId($itemGroupId) {
		$this->itemGroupId = $itemGroupId;
	}

	/**
	 * 商品グループGRNを設定
	 *
	 * @param string $itemGroupId 商品グループGRN
	 * @return self
	 */
	public function withItemGroupId($itemGroupId): self {
		$this->setItemGroupId($itemGroupId);
		return $this;
	}

	/**
	 * 商品グループ名を取得
	 *
	 * @return string 商品グループ名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 商品グループ名を設定
	 *
	 * @param string $name 商品グループ名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 商品グループ名を設定
	 *
	 * @param string $name 商品グループ名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * 販売している商品名のリストを取得
	 *
	 * @return array 販売している商品名のリスト
	 */
	public function getItemNames() {
		return $this->itemNames;
	}

	/**
	 * 販売している商品名のリストを設定
	 *
	 * @param array $itemNames 販売している商品名のリスト
	 */
	public function setItemNames($itemNames) {
		$this->itemNames = $itemNames;
	}

	/**
	 * 販売している商品名のリストを設定
	 *
	 * @param array $itemNames 販売している商品名のリスト
	 * @return self
	 */
	public function withItemNames($itemNames): self {
		$this->setItemNames($itemNames);
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
	 * @return ItemGroupMaster
	 */
    static function build(array $array)
    {
        $item = new ItemGroupMaster();
        $item->setItemGroupId(isset($array['itemGroupId']) ? $array['itemGroupId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setItemNames(isset($array['itemNames']) ? $array['itemNames'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}