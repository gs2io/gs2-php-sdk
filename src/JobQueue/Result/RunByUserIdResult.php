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

namespace Gs2\JobQueue\Result;

use Gs2\Core\Model\IResult;
use Gs2\JobQueue\Model\Job;
use Gs2\JobQueue\Model\JobResultBody;

/**
 * Result of runByUserId: Execute a job by User ID
 *
 * @see https://docs.gs2.io/api_reference/job_queue/sdk/#runbyuserid
 */
class RunByUserIdResult implements IResult {
    /** @var Job Job */
    private $item;
    /** @var JobResultBody Job execution result body */
    private $result;
    /** @var bool */
    private $isLastJob;

    /** @return Job|null Job */
	public function getItem(): ?Job {
		return $this->item;
	}

    /** @param Job|null $item Job */
	public function setItem(?Job $item) {
		$this->item = $item;
	}

    /**
     * @param Job|null $item Job
     * @return RunByUserIdResult
     */
	public function withItem(?Job $item): RunByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return JobResultBody|null Job execution result body */
	public function getResult(): ?JobResultBody {
		return $this->result;
	}

    /** @param JobResultBody|null $result Job execution result body */
	public function setResult(?JobResultBody $result) {
		$this->result = $result;
	}

    /**
     * @param JobResultBody|null $result Job execution result body
     * @return RunByUserIdResult
     */
	public function withResult(?JobResultBody $result): RunByUserIdResult {
		$this->result = $result;
		return $this;
	}

    /** @return bool|null */
	public function getIsLastJob(): ?bool {
		return $this->isLastJob;
	}

    /** @param bool|null $isLastJob */
	public function setIsLastJob(?bool $isLastJob) {
		$this->isLastJob = $isLastJob;
	}

    /**
     * @param bool|null $isLastJob
     * @return RunByUserIdResult
     */
	public function withIsLastJob(?bool $isLastJob): RunByUserIdResult {
		$this->isLastJob = $isLastJob;
		return $this;
	}

    public static function fromJson(?array $data): ?RunByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new RunByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Job::fromJson($data['item']) : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? JobResultBody::fromJson($data['result']) : null)
            ->withIsLastJob(array_key_exists('isLastJob', $data) ? $data['isLastJob'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "result" => $this->getResult() !== null ? $this->getResult()->toJson() : null,
            "isLastJob" => $this->getIsLastJob(),
        );
    }
}