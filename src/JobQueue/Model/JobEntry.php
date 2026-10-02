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
 * Register Job
 *
 * @see https://docs.gs2.io/api_reference/job_queue/sdk/#jobentry
 */
class JobEntry implements IModel {
	/**
     * @var string Script GRN
	 */
	private $scriptId;
	/**
     * @var string Argument
	 */
	private $args;
	/**
     * @var int Maximum Number of Attempts
	 */
	private $maxTryCount;
    /** @return string|null Script GRN */
	public function getScriptId(): ?string {
		return $this->scriptId;
	}
    /** @param string|null $scriptId Script GRN */
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}
    /**
     * @param string|null $scriptId Script GRN
     * @return JobEntry
     */
	public function withScriptId(?string $scriptId): JobEntry {
		$this->scriptId = $scriptId;
		return $this;
	}
    /** @return string|null Argument */
	public function getArgs(): ?string {
		return $this->args;
	}
    /** @param string|null $args Argument */
	public function setArgs(?string $args) {
		$this->args = $args;
	}
    /**
     * @param string|null $args Argument
     * @return JobEntry
     */
	public function withArgs(?string $args): JobEntry {
		$this->args = $args;
		return $this;
	}
    /** @return int|null Maximum Number of Attempts */
	public function getMaxTryCount(): ?int {
		return $this->maxTryCount;
	}
    /** @param int|null $maxTryCount Maximum Number of Attempts */
	public function setMaxTryCount(?int $maxTryCount) {
		$this->maxTryCount = $maxTryCount;
	}
    /**
     * @param int|null $maxTryCount Maximum Number of Attempts
     * @return JobEntry
     */
	public function withMaxTryCount(?int $maxTryCount): JobEntry {
		$this->maxTryCount = $maxTryCount;
		return $this;
	}

    public static function fromJson(?array $data): ?JobEntry {
        if ($data === null) {
            return null;
        }
        return (new JobEntry())
            ->withScriptId(array_key_exists('scriptId', $data) && $data['scriptId'] !== null ? $data['scriptId'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null)
            ->withMaxTryCount(array_key_exists('maxTryCount', $data) && $data['maxTryCount'] !== null ? $data['maxTryCount'] : null);
    }

    public function toJson(): array {
        return array(
            "scriptId" => $this->getScriptId(),
            "args" => $this->getArgs(),
            "maxTryCount" => $this->getMaxTryCount(),
        );
    }
}