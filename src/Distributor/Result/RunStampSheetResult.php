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

/** Result of runStampSheet: Execute acquire action of transaction */
class RunStampSheetResult implements IResult {
    /** @var int Status code */
    private $statusCode;
    /** @var string Response content */
    private $result;

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
     * @return RunStampSheetResult
     */
	public function withStatusCode(?int $statusCode): RunStampSheetResult {
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
     * @return RunStampSheetResult
     */
	public function withResult(?string $result): RunStampSheetResult {
		$this->result = $result;
		return $this;
	}

    public static function fromJson(?array $data): ?RunStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new RunStampSheetResult())
            ->withStatusCode(array_key_exists('statusCode', $data) && $data['statusCode'] !== null ? $data['statusCode'] : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : null);
    }

    public function toJson(): array {
        return array(
            "statusCode" => $this->getStatusCode(),
            "result" => $this->getResult(),
        );
    }
}