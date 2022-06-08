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

namespace Gs2\Ranking\Result;

use Gs2\Core\Model\IResult;

class CalcRankingResult implements IResult {
    /** @var bool */
    private $processing;

	public function getProcessing(): ?bool {
		return $this->processing;
	}

	public function setProcessing(?bool $processing) {
		$this->processing = $processing;
	}

	public function withProcessing(?bool $processing): CalcRankingResult {
		$this->processing = $processing;
		return $this;
	}

    public static function fromJson(?array $data): ?CalcRankingResult {
        if ($data === null) {
            return null;
        }
        return (new CalcRankingResult())
            ->withProcessing(array_key_exists('processing', $data) ? $data['processing'] : null);
    }

    public function toJson(): array {
        return array(
            "processing" => $this->getProcessing(),
        );
    }
}