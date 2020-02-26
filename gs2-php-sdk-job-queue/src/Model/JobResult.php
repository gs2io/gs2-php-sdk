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
 * ジョブ実行結果
 *
 * @author Game Server Services, Inc.
 *
 */
class JobResult implements IModel {
	/**
     * @var string ジョブ実行結果
	 */
	protected $jobResultId;

	/**
	 * ジョブ実行結果を取得
	 *
	 * @return string|null ジョブ実行結果
	 */
	public function getJobResultId(): ?string {
		return $this->jobResultId;
	}

	/**
	 * ジョブ実行結果を設定
	 *
	 * @param string|null $jobResultId ジョブ実行結果
	 */
	public function setJobResultId(?string $jobResultId) {
		$this->jobResultId = $jobResultId;
	}

	/**
	 * ジョブ実行結果を設定
	 *
	 * @param string|null $jobResultId ジョブ実行結果
	 * @return JobResult $this
	 */
	public function withJobResultId(?string $jobResultId): JobResult {
		$this->jobResultId = $jobResultId;
		return $this;
	}
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
	 * @return JobResult $this
	 */
	public function withJobId(?string $jobId): JobResult {
		$this->jobId = $jobId;
		return $this;
	}
	/**
     * @var int None
	 */
	protected $tryNumber;

	/**
	 * Noneを取得
	 *
	 * @return int|null None
	 */
	public function getTryNumber(): ?int {
		return $this->tryNumber;
	}

	/**
	 * Noneを設定
	 *
	 * @param int|null $tryNumber None
	 */
	public function setTryNumber(?int $tryNumber) {
		$this->tryNumber = $tryNumber;
	}

	/**
	 * Noneを設定
	 *
	 * @param int|null $tryNumber None
	 * @return JobResult $this
	 */
	public function withTryNumber(?int $tryNumber): JobResult {
		$this->tryNumber = $tryNumber;
		return $this;
	}
	/**
     * @var int None
	 */
	protected $statusCode;

	/**
	 * Noneを取得
	 *
	 * @return int|null None
	 */
	public function getStatusCode(): ?int {
		return $this->statusCode;
	}

	/**
	 * Noneを設定
	 *
	 * @param int|null $statusCode None
	 */
	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}

	/**
	 * Noneを設定
	 *
	 * @param int|null $statusCode None
	 * @return JobResult $this
	 */
	public function withStatusCode(?int $statusCode): JobResult {
		$this->statusCode = $statusCode;
		return $this;
	}
	/**
     * @var string レスポンスの内容
	 */
	protected $result;

	/**
	 * レスポンスの内容を取得
	 *
	 * @return string|null レスポンスの内容
	 */
	public function getResult(): ?string {
		return $this->result;
	}

	/**
	 * レスポンスの内容を設定
	 *
	 * @param string|null $result レスポンスの内容
	 */
	public function setResult(?string $result) {
		$this->result = $result;
	}

	/**
	 * レスポンスの内容を設定
	 *
	 * @param string|null $result レスポンスの内容
	 * @return JobResult $this
	 */
	public function withResult(?string $result): JobResult {
		$this->result = $result;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $tryAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getTryAt(): ?int {
		return $this->tryAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $tryAt 作成日時
	 */
	public function setTryAt(?int $tryAt) {
		$this->tryAt = $tryAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $tryAt 作成日時
	 * @return JobResult $this
	 */
	public function withTryAt(?int $tryAt): JobResult {
		$this->tryAt = $tryAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "jobResultId" => $this->jobResultId,
            "jobId" => $this->jobId,
            "tryNumber" => $this->tryNumber,
            "statusCode" => $this->statusCode,
            "result" => $this->result,
            "tryAt" => $this->tryAt,
        );
    }

    public static function fromJson(array $data): JobResult {
        $model = new JobResult();
        $model->setJobResultId(isset($data["jobResultId"]) ? $data["jobResultId"] : null);
        $model->setJobId(isset($data["jobId"]) ? $data["jobId"] : null);
        $model->setTryNumber(isset($data["tryNumber"]) ? $data["tryNumber"] : null);
        $model->setStatusCode(isset($data["statusCode"]) ? $data["statusCode"] : null);
        $model->setResult(isset($data["result"]) ? $data["result"] : null);
        $model->setTryAt(isset($data["tryAt"]) ? $data["tryAt"] : null);
        return $model;
    }
}