<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

use Gs2\Core\Model\IModel;

/**
 * ランキング
 *
 * @author Game Server Services, Inc.
 *
 */
class Ranking implements IModel {
	/**
     * @var int 順位
	 */
	protected $rank;

	/**
	 * 順位を取得
	 *
	 * @return int|null 順位
	 */
	public function getRank(): ?int {
		return $this->rank;
	}

	/**
	 * 順位を設定
	 *
	 * @param int|null $rank 順位
	 */
	public function setRank(?int $rank) {
		$this->rank = $rank;
	}

	/**
	 * 順位を設定
	 *
	 * @param int|null $rank 順位
	 * @return Ranking $this
	 */
	public function withRank(?int $rank): Ranking {
		$this->rank = $rank;
		return $this;
	}
	/**
     * @var int 1位からのインデックス
	 */
	protected $index;

	/**
	 * 1位からのインデックスを取得
	 *
	 * @return int|null 1位からのインデックス
	 */
	public function getIndex(): ?int {
		return $this->index;
	}

	/**
	 * 1位からのインデックスを設定
	 *
	 * @param int|null $index 1位からのインデックス
	 */
	public function setIndex(?int $index) {
		$this->index = $index;
	}

	/**
	 * 1位からのインデックスを設定
	 *
	 * @param int|null $index 1位からのインデックス
	 * @return Ranking $this
	 */
	public function withIndex(?int $index): Ranking {
		$this->index = $index;
		return $this;
	}
	/**
     * @var string ユーザID
	 */
	protected $userId;

	/**
	 * ユーザIDを取得
	 *
	 * @return string|null ユーザID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string|null $userId ユーザID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string|null $userId ユーザID
	 * @return Ranking $this
	 */
	public function withUserId(?string $userId): Ranking {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int スコア
	 */
	protected $score;

	/**
	 * スコアを取得
	 *
	 * @return int|null スコア
	 */
	public function getScore(): ?int {
		return $this->score;
	}

	/**
	 * スコアを設定
	 *
	 * @param int|null $score スコア
	 */
	public function setScore(?int $score) {
		$this->score = $score;
	}

	/**
	 * スコアを設定
	 *
	 * @param int|null $score スコア
	 * @return Ranking $this
	 */
	public function withScore(?int $score): Ranking {
		$this->score = $score;
		return $this;
	}
	/**
     * @var string メタデータ
	 */
	protected $metadata;

	/**
	 * メタデータを取得
	 *
	 * @return string|null メタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 * @return Ranking $this
	 */
	public function withMetadata(?string $metadata): Ranking {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Ranking $this
	 */
	public function withCreatedAt(?int $createdAt): Ranking {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "rank" => $this->rank,
            "index" => $this->index,
            "userId" => $this->userId,
            "score" => $this->score,
            "metadata" => $this->metadata,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): Ranking {
        $model = new Ranking();
        $model->setRank(isset($data["rank"]) ? $data["rank"] : null);
        $model->setIndex(isset($data["index"]) ? $data["index"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setScore(isset($data["score"]) ? $data["score"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}