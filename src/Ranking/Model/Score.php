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
 * スコア
 *
 * @author Game Server Services, Inc.
 *
 */
class Score implements IModel {
	/**
     * @var string スコア
	 */
	protected $scoreId;

	/**
	 * スコアを取得
	 *
	 * @return string|null スコア
	 */
	public function getScoreId(): ?string {
		return $this->scoreId;
	}

	/**
	 * スコアを設定
	 *
	 * @param string|null $scoreId スコア
	 */
	public function setScoreId(?string $scoreId) {
		$this->scoreId = $scoreId;
	}

	/**
	 * スコアを設定
	 *
	 * @param string|null $scoreId スコア
	 * @return Score $this
	 */
	public function withScoreId(?string $scoreId): Score {
		$this->scoreId = $scoreId;
		return $this;
	}
	/**
     * @var string カテゴリ名
	 */
	protected $categoryName;

	/**
	 * カテゴリ名を取得
	 *
	 * @return string|null カテゴリ名
	 */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $categoryName カテゴリ名
	 */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $categoryName カテゴリ名
	 * @return Score $this
	 */
	public function withCategoryName(?string $categoryName): Score {
		$this->categoryName = $categoryName;
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
	 * @return Score $this
	 */
	public function withUserId(?string $userId): Score {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string スコアのユニークID
	 */
	protected $uniqueId;

	/**
	 * スコアのユニークIDを取得
	 *
	 * @return string|null スコアのユニークID
	 */
	public function getUniqueId(): ?string {
		return $this->uniqueId;
	}

	/**
	 * スコアのユニークIDを設定
	 *
	 * @param string|null $uniqueId スコアのユニークID
	 */
	public function setUniqueId(?string $uniqueId) {
		$this->uniqueId = $uniqueId;
	}

	/**
	 * スコアのユニークIDを設定
	 *
	 * @param string|null $uniqueId スコアのユニークID
	 * @return Score $this
	 */
	public function withUniqueId(?string $uniqueId): Score {
		$this->uniqueId = $uniqueId;
		return $this;
	}
	/**
     * @var string スコアを獲得したユーザID
	 */
	protected $scorerUserId;

	/**
	 * スコアを獲得したユーザIDを取得
	 *
	 * @return string|null スコアを獲得したユーザID
	 */
	public function getScorerUserId(): ?string {
		return $this->scorerUserId;
	}

	/**
	 * スコアを獲得したユーザIDを設定
	 *
	 * @param string|null $scorerUserId スコアを獲得したユーザID
	 */
	public function setScorerUserId(?string $scorerUserId) {
		$this->scorerUserId = $scorerUserId;
	}

	/**
	 * スコアを獲得したユーザIDを設定
	 *
	 * @param string|null $scorerUserId スコアを獲得したユーザID
	 * @return Score $this
	 */
	public function withScorerUserId(?string $scorerUserId): Score {
		$this->scorerUserId = $scorerUserId;
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
	 * @return Score $this
	 */
	public function withScore(?int $score): Score {
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
	 * @return Score $this
	 */
	public function withMetadata(?string $metadata): Score {
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
	 * @return Score $this
	 */
	public function withCreatedAt(?int $createdAt): Score {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "scoreId" => $this->scoreId,
            "categoryName" => $this->categoryName,
            "userId" => $this->userId,
            "uniqueId" => $this->uniqueId,
            "scorerUserId" => $this->scorerUserId,
            "score" => $this->score,
            "metadata" => $this->metadata,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): Score {
        $model = new Score();
        $model->setScoreId(isset($data["scoreId"]) ? $data["scoreId"] : null);
        $model->setCategoryName(isset($data["categoryName"]) ? $data["categoryName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setUniqueId(isset($data["uniqueId"]) ? $data["uniqueId"] : null);
        $model->setScorerUserId(isset($data["scorerUserId"]) ? $data["scorerUserId"] : null);
        $model->setScore(isset($data["score"]) ? $data["score"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}