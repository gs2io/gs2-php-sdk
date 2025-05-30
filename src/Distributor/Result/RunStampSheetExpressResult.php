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

class RunStampSheetExpressResult implements IResult {
    /** @var array */
    private $verifyTaskResultCodes;
    /** @var array */
    private $verifyTaskResults;
    /** @var array */
    private $taskResultCodes;
    /** @var array */
    private $taskResults;
    /** @var int */
    private $sheetResultCode;
    /** @var string */
    private $sheetResult;

	public function getVerifyTaskResultCodes(): ?array {
		return $this->verifyTaskResultCodes;
	}

	public function setVerifyTaskResultCodes(?array $verifyTaskResultCodes) {
		$this->verifyTaskResultCodes = $verifyTaskResultCodes;
	}

	public function withVerifyTaskResultCodes(?array $verifyTaskResultCodes): RunStampSheetExpressResult {
		$this->verifyTaskResultCodes = $verifyTaskResultCodes;
		return $this;
	}

	public function getVerifyTaskResults(): ?array {
		return $this->verifyTaskResults;
	}

	public function setVerifyTaskResults(?array $verifyTaskResults) {
		$this->verifyTaskResults = $verifyTaskResults;
	}

	public function withVerifyTaskResults(?array $verifyTaskResults): RunStampSheetExpressResult {
		$this->verifyTaskResults = $verifyTaskResults;
		return $this;
	}

	public function getTaskResultCodes(): ?array {
		return $this->taskResultCodes;
	}

	public function setTaskResultCodes(?array $taskResultCodes) {
		$this->taskResultCodes = $taskResultCodes;
	}

	public function withTaskResultCodes(?array $taskResultCodes): RunStampSheetExpressResult {
		$this->taskResultCodes = $taskResultCodes;
		return $this;
	}

	public function getTaskResults(): ?array {
		return $this->taskResults;
	}

	public function setTaskResults(?array $taskResults) {
		$this->taskResults = $taskResults;
	}

	public function withTaskResults(?array $taskResults): RunStampSheetExpressResult {
		$this->taskResults = $taskResults;
		return $this;
	}

	public function getSheetResultCode(): ?int {
		return $this->sheetResultCode;
	}

	public function setSheetResultCode(?int $sheetResultCode) {
		$this->sheetResultCode = $sheetResultCode;
	}

	public function withSheetResultCode(?int $sheetResultCode): RunStampSheetExpressResult {
		$this->sheetResultCode = $sheetResultCode;
		return $this;
	}

	public function getSheetResult(): ?string {
		return $this->sheetResult;
	}

	public function setSheetResult(?string $sheetResult) {
		$this->sheetResult = $sheetResult;
	}

	public function withSheetResult(?string $sheetResult): RunStampSheetExpressResult {
		$this->sheetResult = $sheetResult;
		return $this;
	}

    public static function fromJson(?array $data): ?RunStampSheetExpressResult {
        if ($data === null) {
            return null;
        }
        return (new RunStampSheetExpressResult())
            ->withVerifyTaskResultCodes(!array_key_exists('verifyTaskResultCodes', $data) || $data['verifyTaskResultCodes'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['verifyTaskResultCodes']
            ))
            ->withVerifyTaskResults(!array_key_exists('verifyTaskResults', $data) || $data['verifyTaskResults'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['verifyTaskResults']
            ))
            ->withTaskResultCodes(!array_key_exists('taskResultCodes', $data) || $data['taskResultCodes'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['taskResultCodes']
            ))
            ->withTaskResults(!array_key_exists('taskResults', $data) || $data['taskResults'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['taskResults']
            ))
            ->withSheetResultCode(array_key_exists('sheetResultCode', $data) && $data['sheetResultCode'] !== null ? $data['sheetResultCode'] : null)
            ->withSheetResult(array_key_exists('sheetResult', $data) && $data['sheetResult'] !== null ? $data['sheetResult'] : null);
    }

    public function toJson(): array {
        return array(
            "verifyTaskResultCodes" => $this->getVerifyTaskResultCodes() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getVerifyTaskResultCodes()
            ),
            "verifyTaskResults" => $this->getVerifyTaskResults() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getVerifyTaskResults()
            ),
            "taskResultCodes" => $this->getTaskResultCodes() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getTaskResultCodes()
            ),
            "taskResults" => $this->getTaskResults() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getTaskResults()
            ),
            "sheetResultCode" => $this->getSheetResultCode(),
            "sheetResult" => $this->getSheetResult(),
        );
    }
}