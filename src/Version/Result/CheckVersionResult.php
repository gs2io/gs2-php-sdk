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

namespace Gs2\Version\Result;

use Gs2\Core\Model\IResult;
use Gs2\Version\Model\Version;
use Gs2\Version\Model\ScheduleVersion;
use Gs2\Version\Model\VersionModel;
use Gs2\Version\Model\Status;

class CheckVersionResult implements IResult {
    /** @var string */
    private $projectToken;
    /** @var array */
    private $warnings;
    /** @var array */
    private $errors;

	public function getProjectToken(): ?string {
		return $this->projectToken;
	}

	public function setProjectToken(?string $projectToken) {
		$this->projectToken = $projectToken;
	}

	public function withProjectToken(?string $projectToken): CheckVersionResult {
		$this->projectToken = $projectToken;
		return $this;
	}

	public function getWarnings(): ?array {
		return $this->warnings;
	}

	public function setWarnings(?array $warnings) {
		$this->warnings = $warnings;
	}

	public function withWarnings(?array $warnings): CheckVersionResult {
		$this->warnings = $warnings;
		return $this;
	}

	public function getErrors(): ?array {
		return $this->errors;
	}

	public function setErrors(?array $errors) {
		$this->errors = $errors;
	}

	public function withErrors(?array $errors): CheckVersionResult {
		$this->errors = $errors;
		return $this;
	}

    public static function fromJson(?array $data): ?CheckVersionResult {
        if ($data === null) {
            return null;
        }
        return (new CheckVersionResult())
            ->withProjectToken(array_key_exists('projectToken', $data) && $data['projectToken'] !== null ? $data['projectToken'] : null)
            ->withWarnings(!array_key_exists('warnings', $data) || $data['warnings'] === null ? null : array_map(
                function ($item) {
                    return Status::fromJson($item);
                },
                $data['warnings']
            ))
            ->withErrors(!array_key_exists('errors', $data) || $data['errors'] === null ? null : array_map(
                function ($item) {
                    return Status::fromJson($item);
                },
                $data['errors']
            ));
    }

    public function toJson(): array {
        return array(
            "projectToken" => $this->getProjectToken(),
            "warnings" => $this->getWarnings() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getWarnings()
            ),
            "errors" => $this->getErrors() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getErrors()
            ),
        );
    }
}