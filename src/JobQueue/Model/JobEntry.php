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


class JobEntry implements IModel {
	/**
     * @var string
	 */
	private $scriptId;
	/**
     * @var string
	 */
	private $args;
	/**
     * @var int
	 */
	private $maxTryCount;

	public function getScriptId(): ?string {
		return $this->scriptId;
	}

	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}

	public function withScriptId(?string $scriptId): JobEntry {
		$this->scriptId = $scriptId;
		return $this;
	}

	public function getArgs(): ?string {
		return $this->args;
	}

	public function setArgs(?string $args) {
		$this->args = $args;
	}

	public function withArgs(?string $args): JobEntry {
		$this->args = $args;
		return $this;
	}

	public function getMaxTryCount(): ?int {
		return $this->maxTryCount;
	}

	public function setMaxTryCount(?int $maxTryCount) {
		$this->maxTryCount = $maxTryCount;
	}

	public function withMaxTryCount(?int $maxTryCount): JobEntry {
		$this->maxTryCount = $maxTryCount;
		return $this;
	}

    public static function fromJson(?array $data): ?JobEntry {
        if ($data === null) {
            return null;
        }
        return (new JobEntry())
            ->withScriptId(empty($data['scriptId']) ? null : $data['scriptId'])
            ->withArgs(empty($data['args']) ? null : $data['args'])
            ->withMaxTryCount(empty($data['maxTryCount']) ? null : $data['maxTryCount']);
    }

    public function toJson(): array {
        return array(
            "scriptId" => $this->getScriptId(),
            "args" => $this->getArgs(),
            "maxTryCount" => $this->getMaxTryCount(),
        );
    }
}