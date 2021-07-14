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

class RunStampSheetResult implements IResult {
    /** @var string */
    private $result;

	public function getResult(): ?string {
		return $this->result;
	}

	public function setResult(?string $result) {
		$this->result = $result;
	}

	public function withResult(?string $result): RunStampSheetResult {
		$this->result = $result;
		return $this;
	}

    public static function fromJson(?array $data): ?RunStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new RunStampSheetResult())
            ->withResult(empty($data['result']) ? null : $data['result']);
    }

    public function toJson(): array {
        return array(
            "result" => $this->getResult(),
        );
    }
}