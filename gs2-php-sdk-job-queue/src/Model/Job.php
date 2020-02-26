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

namespace Gs2\JobQueue\Model;

use Gs2\Core\Model\IModel;

/**
 * ジョブ
 *
 * @author Game Server Services, Inc.
 *
 */
class Job implements IModel {
	/**
     * @var string ジョブ
	 */
	protected $jobId;

	/**
	 * ジョブを取得
	 *
	 * @return string|null ジョブ
	 */
	public function getJobId(): ?string {
		return $this->jobId;
	}

	/**
	 * ジョブを設定
	 *
	 * @param string|null $jobId ジョブ
	 */
	public function setJobId(?string $jobId) {
		$this->jobId = $jobId;
	}

	/**
	 * ジョブを設定
	 *
	 * @param string|null $jobId ジョブ
	 * @return Job $this
	 */
	public function withJobId(?string $jobId): Job {
		$this->jobId = $jobId;
		return $this;
	}
	/**
     * @var string ジョブの名前
	 */
	protected $name;

	/**
	 * ジョブの名前を取得
	 *
	 * @return string|null ジョブの名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ジョブの名前を設定
	 *
	 * @param string|null $name ジョブの名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ジョブの名前を設定
	 *
	 * @param string|null $name ジョブの名前
	 * @return Job $this
	 */
	public function withName(?string $name): Job {
		$this->name = $name;
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
	 * @return Job $this
	 */
	public function withUserId(?string $userId): Job {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string ジョブの実行に使用するスクリプト のGRN
	 */
	protected $scriptId;

	/**
	 * ジョブの実行に使用するスクリプト のGRNを取得
	 *
	 * @return string|null ジョブの実行に使用するスクリプト のGRN
	 */
	public function getScriptId(): ?string {
		return $this->scriptId;
	}

	/**
	 * ジョブの実行に使用するスクリプト のGRNを設定
	 *
	 * @param string|null $scriptId ジョブの実行に使用するスクリプト のGRN
	 */
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}

	/**
	 * ジョブの実行に使用するスクリプト のGRNを設定
	 *
	 * @param string|null $scriptId ジョブの実行に使用するスクリプト のGRN
	 * @return Job $this
	 */
	public function withScriptId(?string $scriptId): Job {
		$this->scriptId = $scriptId;
		return $this;
	}
	/**
     * @var string 引数
	 */
	protected $args;

	/**
	 * 引数を取得
	 *
	 * @return string|null 引数
	 */
	public function getArgs(): ?string {
		return $this->args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string|null $args 引数
	 */
	public function setArgs(?string $args) {
		$this->args = $args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string|null $args 引数
	 * @return Job $this
	 */
	public function withArgs(?string $args): Job {
		$this->args = $args;
		return $this;
	}
	/**
     * @var int 現在のリトライ回数
	 */
	protected $currentRetryCount;

	/**
	 * 現在のリトライ回数を取得
	 *
	 * @return int|null 現在のリトライ回数
	 */
	public function getCurrentRetryCount(): ?int {
		return $this->currentRetryCount;
	}

	/**
	 * 現在のリトライ回数を設定
	 *
	 * @param int|null $currentRetryCount 現在のリトライ回数
	 */
	public function setCurrentRetryCount(?int $currentRetryCount) {
		$this->currentRetryCount = $currentRetryCount;
	}

	/**
	 * 現在のリトライ回数を設定
	 *
	 * @param int|null $currentRetryCount 現在のリトライ回数
	 * @return Job $this
	 */
	public function withCurrentRetryCount(?int $currentRetryCount): Job {
		$this->currentRetryCount = $currentRetryCount;
		return $this;
	}
	/**
     * @var int 最大試行回数
	 */
	protected $maxTryCount;

	/**
	 * 最大試行回数を取得
	 *
	 * @return int|null 最大試行回数
	 */
	public function getMaxTryCount(): ?int {
		return $this->maxTryCount;
	}

	/**
	 * 最大試行回数を設定
	 *
	 * @param int|null $maxTryCount 最大試行回数
	 */
	public function setMaxTryCount(?int $maxTryCount) {
		$this->maxTryCount = $maxTryCount;
	}

	/**
	 * 最大試行回数を設定
	 *
	 * @param int|null $maxTryCount 最大試行回数
	 * @return Job $this
	 */
	public function withMaxTryCount(?int $maxTryCount): Job {
		$this->maxTryCount = $maxTryCount;
		return $this;
	}
	/**
     * @var float ソート用インデックス(現在時刻(ミリ秒).登録時のインデックス)
	 */
	protected $index;

	/**
	 * ソート用インデックス(現在時刻(ミリ秒).登録時のインデックス)を取得
	 *
	 * @return float|null ソート用インデックス(現在時刻(ミリ秒).登録時のインデックス)
	 */
	public function getIndex(): ?float {
		return $this->index;
	}

	/**
	 * ソート用インデックス(現在時刻(ミリ秒).登録時のインデックス)を設定
	 *
	 * @param float|null $index ソート用インデックス(現在時刻(ミリ秒).登録時のインデックス)
	 */
	public function setIndex(?float $index) {
		$this->index = $index;
	}

	/**
	 * ソート用インデックス(現在時刻(ミリ秒).登録時のインデックス)を設定
	 *
	 * @param float|null $index ソート用インデックス(現在時刻(ミリ秒).登録時のインデックス)
	 * @return Job $this
	 */
	public function withIndex(?float $index): Job {
		$this->index = $index;
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
	 * @return Job $this
	 */
	public function withCreatedAt(?int $createdAt): Job {
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
	 * @return Job $this
	 */
	public function withUpdatedAt(?int $updatedAt): Job {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "jobId" => $this->jobId,
            "name" => $this->name,
            "userId" => $this->userId,
            "scriptId" => $this->scriptId,
            "args" => $this->args,
            "currentRetryCount" => $this->currentRetryCount,
            "maxTryCount" => $this->maxTryCount,
            "index" => $this->index,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Job {
        $model = new Job();
        $model->setJobId(isset($data["jobId"]) ? $data["jobId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setScriptId(isset($data["scriptId"]) ? $data["scriptId"] : null);
        $model->setArgs(isset($data["args"]) ? $data["args"] : null);
        $model->setCurrentRetryCount(isset($data["currentRetryCount"]) ? $data["currentRetryCount"] : null);
        $model->setMaxTryCount(isset($data["maxTryCount"]) ? $data["maxTryCount"] : null);
        $model->setIndex(isset($data["index"]) ? $data["index"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}