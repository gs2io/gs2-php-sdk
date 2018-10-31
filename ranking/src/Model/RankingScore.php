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
class RankingScore {

	/** @var long 先頭からの位置 */
	private $index;

	/** @var long 同点同順位を採用した場合の順位 */
	private $rank;

	/** @var string ユーザID */
	private $userId;

	/** @var long スコア値 */
	private $score;

	/** @var string メタデータ */
	private $meta;

	/** @var int 登録日時(エポック秒) */
	private $updateAt;

	/**
	 * 先頭からの位置を取得
	 *
	 * @return long 先頭からの位置
	 */
	public function getIndex() {
		return $this->index;
	}

	/**
	 * 先頭からの位置を設定
	 *
	 * @param long $index 先頭からの位置
	 */
	public function setIndex($index) {
		$this->index = $index;
	}

	/**
	 * 先頭からの位置を設定
	 *
	 * @param long $index 先頭からの位置
	 * @return self
	 */
	public function withIndex($index): self {
		$this->setIndex($index);
		return $this;
	}

	/**
	 * 同点同順位を採用した場合の順位を取得
	 *
	 * @return long 同点同順位を採用した場合の順位
	 */
	public function getRank() {
		return $this->rank;
	}

	/**
	 * 同点同順位を採用した場合の順位を設定
	 *
	 * @param long $rank 同点同順位を採用した場合の順位
	 */
	public function setRank($rank) {
		$this->rank = $rank;
	}

	/**
	 * 同点同順位を採用した場合の順位を設定
	 *
	 * @param long $rank 同点同順位を採用した場合の順位
	 * @return self
	 */
	public function withRank($rank): self {
		$this->setRank($rank);
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
	 * @return RankingScore
	 */
    static function build(array $array)
    {
        $item = new RankingScore();
        $item->setIndex(isset($array['index']) ? $array['index'] : null);
        $item->setRank(isset($array['rank']) ? $array['rank'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setScore(isset($array['score']) ? $array['score'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}