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
 * Anybodyマッチメイキング ギャザリング
 *
 * @author Game Server Services, Inc.
 *
 */
class AnybodyGathering {

	/** @var string ギャザリングID */
	private $gatheringId;

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
	 * @return AnybodyGathering
	 */
    static function build(array $array)
    {
        $item = new AnybodyGathering();
        $item->setGatheringId(isset($array['gatheringId']) ? $array['gatheringId'] : null);
        $item->setJoinPlayer(isset($array['joinPlayer']) ? $array['joinPlayer'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}