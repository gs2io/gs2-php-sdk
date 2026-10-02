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

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of runStampTaskWithoutNamespace: Execute consume action of transaction without specifying the GS2-Distributor Namespace
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#runstamptaskwithoutnamespace
 */
class RunStampTaskWithoutNamespaceResult implements IResult {
    /** @var string Context stack reflecting the task execution result */
    private $contextStack;
    /** @var int Status code */
    private $statusCode;
    /** @var string Response content */
    private $result;

    /** @return string|null Context stack reflecting the task execution result */
	public function getContextStack(): ?string {
		return $this->contextStack;
	}

    /** @param string|null $contextStack Context stack reflecting the task execution result */
	public function setContextStack(?string $contextStack) {
		$this->contextStack = $contextStack;
	}

    /**
     * @param string|null $contextStack Context stack reflecting the task execution result
     * @return RunStampTaskWithoutNamespaceResult
     */
	public function withContextStack(?string $contextStack): RunStampTaskWithoutNamespaceResult {
		$this->contextStack = $contextStack;
		return $this;
	}

    /** @return int|null Status code */
	public function getStatusCode(): ?int {
		return $this->statusCode;
	}

    /** @param int|null $statusCode Status code */
	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}

    /**
     * @param int|null $statusCode Status code
     * @return RunStampTaskWithoutNamespaceResult
     */
	public function withStatusCode(?int $statusCode): RunStampTaskWithoutNamespaceResult {
		$this->statusCode = $statusCode;
		return $this;
	}

    /** @return string|null Response content */
	public function getResult(): ?string {
		return $this->result;
	}

    /** @param string|null $result Response content */
	public function setResult(?string $result) {
		$this->result = $result;
	}

    /**
     * @param string|null $result Response content
     * @return RunStampTaskWithoutNamespaceResult
     */
	public function withResult(?string $result): RunStampTaskWithoutNamespaceResult {
		$this->result = $result;
		return $this;
	}

    public static function fromJson(?array $data): ?RunStampTaskWithoutNamespaceResult {
        if ($data === null) {
            return null;
        }
        return (new RunStampTaskWithoutNamespaceResult())
            ->withContextStack(array_key_exists('contextStack', $data) && $data['contextStack'] !== null ? $data['contextStack'] : null)
            ->withStatusCode(array_key_exists('statusCode', $data) && $data['statusCode'] !== null ? $data['statusCode'] : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : null);
    }

    public function toJson(): array {
        return array(
            "contextStack" => $this->getContextStack(),
            "statusCode" => $this->getStatusCode(),
            "result" => $this->getResult(),
        );
    }
}