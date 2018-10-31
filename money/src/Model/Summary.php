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

namespace Gs2\Money\Model;

/**
 * ウォレット
 *
 * @author Game Server Services, Inc.
 *
 */
class Summary {

	/** @var string ユーザID */
	private $userId;

	/** @var int スロット番号 */
	private $slot;

	/** @var int 有償課金通貨所持量 */
	private $paid;

	/** @var int 無償課金通貨所持量 */
	private $free;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ユーザIDを取得
	 *
	 * @return string ユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * スロット番号を取得
	 *
	 * @return int スロット番号
	 */
	public function getSlot() {
		return $this->slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int $slot スロット番号
	 */
	public function setSlot($slot) {
		$this->slot = $slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int $slot スロット番号
	 * @return self
	 */
	public function withSlot($slot): self {
		$this->setSlot($slot);
		return $this;
	}

	/**
	 * 有償課金通貨所持量を取得
	 *
	 * @return int 有償課金通貨所持量
	 */
	public function getPaid() {
		return $this->paid;
	}

	/**
	 * 有償課金通貨所持量を設定
	 *
	 * @param int $paid 有償課金通貨所持量
	 */
	public function setPaid($paid) {
		$this->paid = $paid;
	}

	/**
	 * 有償課金通貨所持量を設定
	 *
	 * @param int $paid 有償課金通貨所持量
	 * @return self
	 */
	public function withPaid($paid): self {
		$this->setPaid($paid);
		return $this;
	}

	/**
	 * 無償課金通貨所持量を取得
	 *
	 * @return int 無償課金通貨所持量
	 */
	public function getFree() {
		return $this->free;
	}

	/**
	 * 無償課金通貨所持量を設定
	 *
	 * @param int $free 無償課金通貨所持量
	 */
	public function setFree($free) {
		$this->free = $free;
	}

	/**
	 * 無償課金通貨所持量を設定
	 *
	 * @param int $free 無償課金通貨所持量
	 * @return self
	 */
	public function withFree($free): self {
		$this->setFree($free);
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
	 * @return Summary
	 */
    static function build(array $array)
    {
        $item = new Summary();
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setSlot(isset($array['slot']) ? $array['slot'] : null);
        $item->setPaid(isset($array['paid']) ? $array['paid'] : null);
        $item->setFree(isset($array['free']) ? $array['free'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}