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

namespace Gs2\Matchmaking\Model;

/**
 * CustomAutoマッチメイキング ギャザリング
 *
 * @author Game Server Services, Inc.
 *
 */
class CustomAutoGathering {

	/** @var string ギャザリングID */
	private $gatheringId;

	/** @var int 属性値1 */
	private $attribute1;

	/** @var int 属性値2 */
	private $attribute2;

	/** @var int 属性値3 */
	private $attribute3;

	/** @var int 属性値4 */
	private $attribute4;

	/** @var int 属性値5 */
	private $attribute5;

	/** @var int 参加プレイヤー数 */
	private $joinPlayer;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ギャザリングIDを取得
	 *
	 * @return string ギャザリングID
	 */
	public function getGatheringId() {
		return $this->gatheringId;
	}

	/**
	 * ギャザリングIDを設定
	 *
	 * @param string $gatheringId ギャザリングID
	 */
	public function setGatheringId($gatheringId) {
		$this->gatheringId = $gatheringId;
	}

	/**
	 * ギャザリングIDを設定
	 *
	 * @param string $gatheringId ギャザリングID
	 * @return self
	 */
	public function withGatheringId($gatheringId): self {
		$this->setGatheringId($gatheringId);
		return $this;
	}

	/**
	 * 属性値1を取得
	 *
	 * @return int 属性値1
	 */
	public function getAttribute1() {
		return $this->attribute1;
	}

	/**
	 * 属性値1を設定
	 *
	 * @param int $attribute1 属性値1
	 */
	public function setAttribute1($attribute1) {
		$this->attribute1 = $attribute1;
	}

	/**
	 * 属性値1を設定
	 *
	 * @param int $attribute1 属性値1
	 * @return self
	 */
	public function withAttribute1($attribute1): self {
		$this->setAttribute1($attribute1);
		return $this;
	}

	/**
	 * 属性値2を取得
	 *
	 * @return int 属性値2
	 */
	public function getAttribute2() {
		return $this->attribute2;
	}

	/**
	 * 属性値2を設定
	 *
	 * @param int $attribute2 属性値2
	 */
	public function setAttribute2($attribute2) {
		$this->attribute2 = $attribute2;
	}

	/**
	 * 属性値2を設定
	 *
	 * @param int $attribute2 属性値2
	 * @return self
	 */
	public function withAttribute2($attribute2): self {
		$this->setAttribute2($attribute2);
		return $this;
	}

	/**
	 * 属性値3を取得
	 *
	 * @return int 属性値3
	 */
	public function getAttribute3() {
		return $this->attribute3;
	}

	/**
	 * 属性値3を設定
	 *
	 * @param int $attribute3 属性値3
	 */
	public function setAttribute3($attribute3) {
		$this->attribute3 = $attribute3;
	}

	/**
	 * 属性値3を設定
	 *
	 * @param int $attribute3 属性値3
	 * @return self
	 */
	public function withAttribute3($attribute3): self {
		$this->setAttribute3($attribute3);
		return $this;
	}

	/**
	 * 属性値4を取得
	 *
	 * @return int 属性値4
	 */
	public function getAttribute4() {
		return $this->attribute4;
	}

	/**
	 * 属性値4を設定
	 *
	 * @param int $attribute4 属性値4
	 */
	public function setAttribute4($attribute4) {
		$this->attribute4 = $attribute4;
	}

	/**
	 * 属性値4を設定
	 *
	 * @param int $attribute4 属性値4
	 * @return self
	 */
	public function withAttribute4($attribute4): self {
		$this->setAttribute4($attribute4);
		return $this;
	}

	/**
	 * 属性値5を取得
	 *
	 * @return int 属性値5
	 */
	public function getAttribute5() {
		return $this->attribute5;
	}

	/**
	 * 属性値5を設定
	 *
	 * @param int $attribute5 属性値5
	 */
	public function setAttribute5($attribute5) {
		$this->attribute5 = $attribute5;
	}

	/**
	 * 属性値5を設定
	 *
	 * @param int $attribute5 属性値5
	 * @return self
	 */
	public function withAttribute5($attribute5): self {
		$this->setAttribute5($attribute5);
		return $this;
	}

	/**
	 * 参加プレイヤー数を取得
	 *
	 * @return int 参加プレイヤー数
	 */
	public function getJoinPlayer() {
		return $this->joinPlayer;
	}

	/**
	 * 参加プレイヤー数を設定
	 *
	 * @param int $joinPlayer 参加プレイヤー数
	 */
	public function setJoinPlayer($joinPlayer) {
		$this->joinPlayer = $joinPlayer;
	}

	/**
	 * 参加プレイヤー数を設定
	 *
	 * @param int $joinPlayer 参加プレイヤー数
	 * @return self
	 */
	public function withJoinPlayer($joinPlayer): self {
		$this->setJoinPlayer($joinPlayer);
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
	 * 更新日時(エポック秒)を取得
	 *
	 * @return int 更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 更新日時(エポック秒)
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
	 * @return CustomAutoGathering
	 */
    static function build(array $array)
    {
        $item = new CustomAutoGathering();
        $item->setGatheringId(isset($array['gatheringId']) ? $array['gatheringId'] : null);
        $item->setAttribute1(isset($array['attribute1']) ? $array['attribute1'] : null);
        $item->setAttribute2(isset($array['attribute2']) ? $array['attribute2'] : null);
        $item->setAttribute3(isset($array['attribute3']) ? $array['attribute3'] : null);
        $item->setAttribute4(isset($array['attribute4']) ? $array['attribute4'] : null);
        $item->setAttribute5(isset($array['attribute5']) ? $array['attribute5'] : null);
        $item->setJoinPlayer(isset($array['joinPlayer']) ? $array['joinPlayer'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}