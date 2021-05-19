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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;

/**
 * クエスト挑戦
 *
 * @author Game Server Services, Inc.
 *
 */
class Progress implements IModel {
	/**
     * @var string クエスト挑戦
	 */
	protected $progressId;

	/**
	 * クエスト挑戦を取得
	 *
	 * @return string|null クエスト挑戦
	 */
	public function getProgressId(): ?string {
		return $this->progressId;
	}

	/**
	 * クエスト挑戦を設定
	 *
	 * @param string|null $progressId クエスト挑戦
	 */
	public function setProgressId(?string $progressId) {
		$this->progressId = $progressId;
	}

	/**
	 * クエスト挑戦を設定
	 *
	 * @param string|null $progressId クエスト挑戦
	 * @return Progress $this
	 */
	public function withProgressId(?string $progressId): Progress {
		$this->progressId = $progressId;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return Progress $this
	 */
	public function withUserId(?string $userId): Progress {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string トランザクションID
	 */
	protected $transactionId;

	/**
	 * トランザクションIDを取得
	 *
	 * @return string|null トランザクションID
	 */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string|null $transactionId トランザクションID
	 */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string|null $transactionId トランザクションID
	 * @return Progress $this
	 */
	public function withTransactionId(?string $transactionId): Progress {
		$this->transactionId = $transactionId;
		return $this;
	}
	/**
     * @var string クエストモデル
	 */
	protected $questModelId;

	/**
	 * クエストモデルを取得
	 *
	 * @return string|null クエストモデル
	 */
	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}

	/**
	 * クエストモデルを設定
	 *
	 * @param string|null $questModelId クエストモデル
	 */
	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}

	/**
	 * クエストモデルを設定
	 *
	 * @param string|null $questModelId クエストモデル
	 * @return Progress $this
	 */
	public function withQuestModelId(?string $questModelId): Progress {
		$this->questModelId = $questModelId;
		return $this;
	}
	/**
     * @var int 乱数シード
	 */
	protected $randomSeed;

	/**
	 * 乱数シードを取得
	 *
	 * @return int|null 乱数シード
	 */
	public function getRandomSeed(): ?int {
		return $this->randomSeed;
	}

	/**
	 * 乱数シードを設定
	 *
	 * @param int|null $randomSeed 乱数シード
	 */
	public function setRandomSeed(?int $randomSeed) {
		$this->randomSeed = $randomSeed;
	}

	/**
	 * 乱数シードを設定
	 *
	 * @param int|null $randomSeed 乱数シード
	 * @return Progress $this
	 */
	public function withRandomSeed(?int $randomSeed): Progress {
		$this->randomSeed = $randomSeed;
		return $this;
	}
	/**
     * @var Reward[] クエストで得られる報酬の上限
	 */
	protected $rewards;

	/**
	 * クエストで得られる報酬の上限を取得
	 *
	 * @return Reward[]|null クエストで得られる報酬の上限
	 */
	public function getRewards(): ?array {
		return $this->rewards;
	}

	/**
	 * クエストで得られる報酬の上限を設定
	 *
	 * @param Reward[]|null $rewards クエストで得られる報酬の上限
	 */
	public function setRewards(?array $rewards) {
		$this->rewards = $rewards;
	}

	/**
	 * クエストで得られる報酬の上限を設定
	 *
	 * @param Reward[]|null $rewards クエストで得られる報酬の上限
	 * @return Progress $this
	 */
	public function withRewards(?array $rewards): Progress {
		$this->rewards = $rewards;
		return $this;
	}
	/**
     * @var string クエストモデルのメタデータ
	 */
	protected $metadata;

	/**
	 * クエストモデルのメタデータを取得
	 *
	 * @return string|null クエストモデルのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * クエストモデルのメタデータを設定
	 *
	 * @param string|null $metadata クエストモデルのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * クエストモデルのメタデータを設定
	 *
	 * @param string|null $metadata クエストモデルのメタデータ
	 * @return Progress $this
	 */
	public function withMetadata(?string $metadata): Progress {
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
	 * @return Progress $this
	 */
	public function withCreatedAt(?int $createdAt): Progress {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Progress $this
	 */
	public function withUpdatedAt(?int $updatedAt): Progress {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "progressId" => $this->progressId,
            "userId" => $this->userId,
            "transactionId" => $this->transactionId,
            "questModelId" => $this->questModelId,
            "randomSeed" => $this->randomSeed,
            "rewards" => array_map(
                function (Reward $v) {
                    return $v->toJson();
                },
                $this->rewards == null ? [] : $this->rewards
            ),
            "metadata" => $this->metadata,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Progress {
        $model = new Progress();
        $model->setProgressId(isset($data["progressId"]) ? $data["progressId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setTransactionId(isset($data["transactionId"]) ? $data["transactionId"] : null);
        $model->setQuestModelId(isset($data["questModelId"]) ? $data["questModelId"] : null);
        $model->setRandomSeed(isset($data["randomSeed"]) ? $data["randomSeed"] : null);
        $model->setRewards(array_map(
                function ($v) {
                    return Reward::fromJson($v);
                },
                isset($data["rewards"]) ? $data["rewards"] : []
            )
        );
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}