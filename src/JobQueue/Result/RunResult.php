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

class RunResult implements IResult {
    /** @var Job */
    private $item;
    /** @var JobResultBody */
    private $result;
    /** @var bool */
    private $isLastJob;

	public function getItem(): ?Job {
		return $this->item;
	}

	public function setItem(?Job $item) {
		$this->item = $item;
	}

	public function withItem(?Job $item): RunResult {
		$this->item = $item;
		return $this;
	}

	public function getResult(): ?JobResultBody {
		return $this->result;
	}

	public function setResult(?JobResultBody $result) {
		$this->result = $result;
	}

	public function withResult(?JobResultBody $result): RunResult {
		$this->result = $result;
		return $this;
	}

	public function getIsLastJob(): ?bool {
		return $this->isLastJob;
	}

	public function setIsLastJob(?bool $isLastJob) {
		$this->isLastJob = $isLastJob;
	}

	public function withIsLastJob(?bool $isLastJob): RunResult {
		$this->isLastJob = $isLastJob;
		return $this;
	}

    public static function fromJson(?array $data): ?RunResult {
        if ($data === null) {
            return null;
        }
        return (new RunResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Job::fromJson($data['item']) : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? JobResultBody::fromJson($data['result']) : null)
            ->withIsLastJob($data['isLastJob']);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "result" => $this->getResult() !== null ? $this->getResult()->toJson() : null,
            "isLastJob" => $this->getIsLastJob(),
        );
    }
}