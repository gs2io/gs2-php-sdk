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

/**
 * Result of deleteByStampTask: Execute job deletion as a consume action
 *
 * @see https://docs.gs2.io/api_reference/job_queue/stamp_sheet/#gs2jobqueuedeletejobbyuserid
 */
class DeleteByStampTaskResult implements IResult {
    /** @var Job Job deleted */
    private $item;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return Job|null Job deleted */
	public function getItem(): ?Job {
		return $this->item;
	}

    /** @param Job|null $item Job deleted */
	public function setItem(?Job $item) {
		$this->item = $item;
	}

    /**
     * @param Job|null $item Job deleted
     * @return DeleteByStampTaskResult
     */
	public function withItem(?Job $item): DeleteByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Context recording the execution results of Consume Actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of Consume Actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of Consume Actions
     * @return DeleteByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): DeleteByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Job::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}