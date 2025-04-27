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

namespace Gs2\Exchange\Model;

use Gs2\Core\Model\IModel;


class LogRate implements IModel {
	/**
     * @var float
	 */
	private $base;
	/**
     * @var array
	 */
	private $logs;
	public function getBase(): ?float {
		return $this->base;
	}
	public function setBase(?float $base) {
		$this->base = $base;
	}
	public function withBase(?float $base): LogRate {
		$this->base = $base;
		return $this;
	}
	public function getLogs(): ?array {
		return $this->logs;
	}
	public function setLogs(?array $logs) {
		$this->logs = $logs;
	}
	public function withLogs(?array $logs): LogRate {
		$this->logs = $logs;
		return $this;
	}

    public static function fromJson(?array $data): ?LogRate {
        if ($data === null) {
            return null;
        }
        return (new LogRate())
            ->withBase(array_key_exists('base', $data) && $data['base'] !== null ? $data['base'] : null)
            ->withLogs(!array_key_exists('logs', $data) || $data['logs'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['logs']
            ));
    }

    public function toJson(): array {
        return array(
            "base" => $this->getBase(),
            "logs" => $this->getLogs() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getLogs()
            ),
        );
    }
}