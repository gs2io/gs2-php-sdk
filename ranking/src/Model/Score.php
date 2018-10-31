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

namespace Gs2\Ranking\Model;

/**
 * スコア
 *
 * @author Game Server Services, Inc.
 *
 */
class Score {

	/** @var string ランキングテーブルGRN */
	private $rankingTableId;

	/** @var string ゲームモード名 */
	private $gameMode;

	/** @var string ユーザID */
	private $userId;

	/** @var long スコア値 */
	private $score;

	/** @var string メタデータ */
	private $meta;

	/** @var int 登録日時(エポック秒) */
	private $updateAt;

	/**
	 * ランキングテーブルGRNを取得
	 *
	 * @return string ランキングテーブルGRN
	 */
	public function getRankingTableId() {
		return $this->rankingTableId;
	}

	/**
	 * ランキングテーブルGRNを設定
	 *
	 * @param string $rankingTableId ランキングテーブルGRN
	 */
	public function setRankingTableId($rankingTableId) {
		$this->rankingTableId = $rankingTableId;
	}

	/**
	 * ランキングテーブルGRNを設定
	 *
	 * @param string $rankingTableId ランキングテーブルGRN
	 * @return self
	 */
	public function withRankingTableId($rankingTableId): self {
		$this->setRankingTableId($rankingTableId);
		return $this;
	}

	/**
	 * ゲームモード名を取得
	 *
	 * @return string ゲームモード名
	 */
	public function getGameMode() {
		return $this->gameMode;
	}

	/**
	 * ゲームモード名を設定
	 *
	 * @param string $gameMode ゲームモード名
	 */
	public function setGameMode($gameMode) {
		$this->gameMode = $gameMode;
	}

	/**
	 * ゲームモード名を設定
	 *
	 * @param string $gameMode ゲームモード名
	 * @return self
	 */
	public function withGameMode($gameMode): self {
		$this->setGameMode($gameMode);
		return $this;
	}

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
	 * スコア値を取得
	 *
	 * @return long スコア値
	 */
	public function getScore() {
		return $this->score;
	}

	/**
	 * スコア値を設定
	 *
	 * @param long $score スコア値
	 */
	public function setScore($score) {
		$this->score = $score;
	}

	/**
	 * スコア値を設定
	 *
	 * @param long $score スコア値
	 * @return self
	 */
	public function withScore($score): self {
		$this->setScore($score);
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
	 * 登録日時(エポック秒)を取得
	 *
	 * @return int 登録日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 登録日時(エポック秒)を設定
	 *
	 * @param int $updateAt 登録日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 登録日時(エポック秒)を設定
	 *
	 * @param int $updateAt 登録日時(エポック秒)
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
	 * @return Score
	 */
    static function build(array $array)
    {
        $item = new Score();
        $item->setRankingTableId(isset($array['rankingTableId']) ? $array['rankingTableId'] : null);
        $item->setGameMode(isset($array['gameMode']) ? $array['gameMode'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setScore(isset($array['score']) ? $array['score'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}