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
    private $taskResults;
    /** @var string */
    private $sheetResult;

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
            ->withTaskResults(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('taskResults', $data) && $data['taskResults'] !== null ? $data['taskResults'] : []
            ))
            ->withSheetResult(array_key_exists('sheetResult', $data) && $data['sheetResult'] !== null ? $data['sheetResult'] : null);
    }

    public function toJson(): array {
        return array(
            "taskResults" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getTaskResults() !== null && $this->getTaskResults() !== null ? $this->getTaskResults() : []
            ),
            "sheetResult" => $this->getSheetResult(),
        );
    }
}